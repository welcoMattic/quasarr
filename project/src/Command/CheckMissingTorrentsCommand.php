<?php

namespace Quasarr\Command;

use Doctrine\Persistence\ManagerRegistry;
use Quasarr\Entity\Movie;
use Quasarr\Entity\TvEpisode;
use Quasarr\Entity\TvSeason;
use Quasarr\Enum\ResourceStatus;
use Quasarr\Message\DownloadMovieMessage;
use Quasarr\Message\DownloadTvEpisodeMessage;
use Quasarr\Message\DownloadTvSeasonMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class CheckMissingTorrentsCommand extends Command
{
    protected static $defaultName = 'check-missing-torrents';

    private $bus;
    private $doctrine;
    private $movieRepository;
    private $tvSeasonRepository;
    private $tvEpisodeRepository;

    protected function configure()
    {
        $this->setDescription('Check missing torrent for existing resources.');
    }

    public function __construct(MessageBusInterface $bus, ManagerRegistry $doctrine)
    {
        $this->bus = $bus;
        $this->doctrine = $doctrine;
        $this->movieRepository = $doctrine->getRepository(Movie::class);
        $this->tvSeasonRepository = $doctrine->getRepository(TvSeason::class);
        $this->tvEpisodeRepository = $doctrine->getRepository(TvEpisode::class);

        parent::__construct(static::$defaultName);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        foreach ($this->movieRepository->findBy(['status' => ResourceStatus::MISSING]) as $missingMovie) {
            $this->bus->dispatch(new DownloadMovieMessage($missingMovie->getId()));
        }

        foreach ($this->tvSeasonRepository->findBy(['status' => ResourceStatus::MISSING]) as $missingSeason) {
            $this->bus->dispatch(new DownloadTvSeasonMessage($missingSeason->getId()));
        }

        foreach ($this->tvEpisodeRepository->findBy(['status' => ResourceStatus::MISSING]) as $missingEpisode) {
            $this->bus->dispatch(new DownloadTvEpisodeMessage($missingEpisode->getShow()->getId(), $missingEpisode->getSeason()->getId(), $missingEpisode->getId()));
        }

        return 0;
    }
}
