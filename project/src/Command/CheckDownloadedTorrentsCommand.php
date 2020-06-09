<?php

namespace Quasarr\Command;

use Doctrine\Persistence\ManagerRegistry;
use Quasarr\Entity\Movie;
use Quasarr\Entity\Torrent;
use Quasarr\Entity\TvEpisode;
use Quasarr\Entity\TvSeason;
use Quasarr\Enum\ResourceStatus;
use Quasarr\Message\StoreMovieMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;
use Transmission\Client;

class CheckDownloadedTorrentsCommand extends Command
{
    protected static $defaultName = 'check-downloaded-torrents';

    private $transmissionClient;
    private $bus;
    private $doctrine;
    private $movieRepository;
    private $tvSeasonRepository;
    private $tvEpisodeRepository;
    private $torrentRepository;

    protected function configure()
    {
        $this->setDescription('Check torrents download progress, and process downloaded ones.');
    }

    public function __construct(
        Client $transmissionClient,
        MessageBusInterface $bus,
        ManagerRegistry $doctrine)
    {
        $this->transmissionClient = $transmissionClient;
        $this->bus = $bus;
        $this->doctrine = $doctrine;
        $this->movieRepository = $doctrine->getRepository(Movie::class);
        $this->tvSeasonRepository = $doctrine->getRepository(TvSeason::class);
        $this->tvEpisodeRepository = $doctrine->getRepository(TvEpisode::class);
        $this->torrentRepository = $doctrine->getRepository(Torrent::class);

        parent::__construct(static::$defaultName);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $downloadingMovies = $this->movieRepository->findBy([
            'status' => ResourceStatus::DOWNLOADING,
        ]);
        $downloadingSeasons = $this->tvSeasonRepository->findBy([
            'status' => ResourceStatus::DOWNLOADING,
        ]);
        $downloadingEpisodes = $this->tvEpisodeRepository->findBy([
            'status' => ResourceStatus::DOWNLOADING,
        ]);

        foreach ($downloadingMovies as $downloadingMovie) {
            $torrent = $this->torrentRepository->findOneBy([
                'mediaId' => $downloadingMovie->getId(),
                'mediaType' => Torrent::MOVIE_TYPE,
            ]);

            if (!$torrent instanceof Torrent) {
                // log something
                continue;
            }

            $this->checkTorrent($torrent);
        }

        // @todo: handle tvSeasons and tvEpisodes

        return 0;
    }

    private function checkTorrent(Torrent $torrent): void
    {
        /** @var \Transmission\Models\Torrent $transmissionTorrent */
        $transmissionTorrent = $this->transmissionClient->get($torrent->getHash())->first();

        if ($transmissionTorrent && $transmissionTorrent->isDone()) {
            if (Torrent::MOVIE_TYPE === $torrent->getMediaType()) {
                $movie = $this->movieRepository->find($torrent->getMediaId());

                if (ResourceStatus::DOWNLOADING !== $movie->getStatus()) {
                    return;
                }

                $filepath = sprintf('%s%s%s',
                    $transmissionTorrent->get('downloadDir'),
                    DIRECTORY_SEPARATOR,
                    $this->findMainFile($transmissionTorrent->get('files'))['name']
                );
                $this->bus->dispatch(new StoreMovieMessage($movie->getId(), $filepath));
                $movie->setStatus(ResourceStatus::DOWNLOADED);

                $this->doctrine->getManager()->flush();

                return;
            }
        }
    }

    private function findMainFile(array $files): array
    {
        uasort($files, function ($fileA, $fileB) {
            if ($fileA['length'] === $fileB['length']) {
                return 0;
            }

            return ($fileA['length'] < $fileB['length']) ? -1 : 1;
        });

        return $files[0];
    }
}
