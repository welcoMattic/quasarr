<?php

namespace Quasarr\MessageHandler;

use Doctrine\Persistence\ManagerRegistry;
use Quasarr\Entity\Torrent;
use Quasarr\Entity\TvEpisode;
use Quasarr\Enum\ResourceStatus;
use Quasarr\Message\DownloadTvEpisodeMessage;
use Quasarr\Message\DownloadTvSeasonMessage;
use Quasarr\Repository\SettingRepository;
use Quasarr\Repository\TvSeasonRepository;
use Quasarr\Repository\TvShowRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use TMDB\API\Client;
use Transmission\Client as TransmissionClient;

final class DownloadTvSeasonMessageHandler implements MessageHandlerInterface
{
    use TorrentResultsHelperTrait;

    private $doctrine;
    private $tvShowRepository;
    private $tvSeasonRepository;
    private $settingRepository;
    private $transmissionClient;
    private $tmdbClient;
    private $jackettClient;
    private $bus;

    public function __construct(ManagerRegistry $doctrine,
        TvShowRepository $tvShowRepository,
        TvSeasonRepository $tvSeasonRepository,
        SettingRepository $settingRepository,
        TransmissionClient $transmissionClient,
        Client $tmdbClient,
        HttpClientInterface $jackettClient,
        MessageBusInterface $bus)
    {
        $this->tvShowRepository = $tvShowRepository;
        $this->tvSeasonRepository = $tvSeasonRepository;
        $this->settingRepository = $settingRepository;
        $this->doctrine = $doctrine;
        $this->transmissionClient = $transmissionClient;
        $this->tmdbClient = $tmdbClient;
        $this->jackettClient = $jackettClient;
        $this->bus = $bus;
    }

    public function __invoke(DownloadTvSeasonMessage $message)
    {
        $tvShow = $this->tvShowRepository->find($message->getTvShowId());
        $tvSeason = $this->tvSeasonRepository->findOneBy([
            'number' => $message->getNumber(),
            'tvShow' => $tvShow,
        ]);
        $seasonNumberPadded = str_pad($tvSeason->getNumber(), 2, '0', STR_PAD_LEFT);

        $queries = [
            sprintf('%s S%s', $tvShow->getTitle(), $seasonNumberPadded),
            sprintf('%s Season %s', $tvShow->getTitle(), $seasonNumberPadded),
            sprintf('%s Saison %s', $tvShow->getTitle(), $seasonNumberPadded),
        ];

        $responses = [];
        foreach ($queries as $query) {
            $responses[] = $this->jackettClient->request('GET', 'api/v2.0/indexers/all/results', [
                'query' => [
                    'Query' => $query,
                    'Category' => [5000, 5070],
                ],
            ]);
        }

        $results = [];

        foreach ($responses as $response) {
            $results = array_merge($results, json_decode($response->getContent())->Results);
        }

        $bestTorrent = $this->findBestResult($results, Torrent::TVSEASON_TYPE);

        if ($bestTorrent) {
            $transmissionTorrent = $this->transmissionClient->addUrl($bestTorrent->Link)->toArray();

            $torrent = new Torrent();
            $torrent->setHash($transmissionTorrent['hashString'])
                ->setCompleted(false)
                ->setMediaId($tvSeason->getId())
                ->setMediaType(Torrent::TVSEASON_TYPE);
            $this->doctrine->getManager()->persist($torrent);

            $tvSeason->setStatus(ResourceStatus::DOWNLOADING);

            $this->doctrine->getManager()->flush();
        } else {
            // This will avoid to search again full season as we now search by episode.
            $tvSeason->setStatus(ResourceStatus::PROCESSED);
            $searchLocaleSetting = $this->settingRepository->findOneBy([
                    'key' => Setting::SEARCH_LOCALE,
                ]) ?? 'fr';
            $tmdbTvShow = $this->tmdbClient->getTvShowDetails($tvShow->getIdTmdb(), ['language' => $searchLocaleSetting]);

            $tmdbTvSeason = null;
            foreach ($tmdbTvShow->getSeasons() as $season) {
                if ($season->getSeasonNumber() === $tvSeason->getNumber()) {
                    $tmdbTvSeason = $season;
                    break;
                }
            }

            if ($tmdbTvSeason) {
                foreach (range(1, $tmdbTvSeason->getEpisodeCount()) as $episodeNumber) {
                    $tvEpisode = new TvEpisode();
                    $tvEpisode->setNumber($episodeNumber)
                        ->setShow($tvShow)
                        ->setSeason($tvSeason)
                        ->setStatus(ResourceStatus::MISSING);
                    $this->doctrine->getManager()->persist($tvEpisode);

                    $this->bus->dispatch(new DownloadTvEpisodeMessage($tvShow->getId(), $tvSeason->getId(), $tvEpisode->getNumber()));
                }

                $this->doctrine->getManager()->flush();
            } else {
                // @todo: log not found DB stored season on TMDB
            }
        }
    }
}
