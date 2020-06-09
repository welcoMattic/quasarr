<?php

namespace Quasarr\Controller;

use Quasarr\Entity\Torrent;
use Quasarr\Entity\TvSeason;
use Quasarr\Entity\TvShow;
use Quasarr\Enum\ResourceStatus;
use Quasarr\Enum\Setting;
use Quasarr\Message\DownloadTvSeasonMessage;
use Quasarr\Repository\SettingRepository;
use Quasarr\Repository\TorrentRepository;
use Quasarr\Repository\TvEpisodeRepository;
use Quasarr\Repository\TvSeasonRepository;
use Quasarr\Repository\TvShowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TMDB\API\Client;
use TMDB\API\Model\TvTvIdGetResponse200;
use Transmission\Client as TransmissionClient;

class TvShowController extends AbstractController
{
    private $tmdbClient;
    private $transmissionClient;

    public function __construct(Client $tmdbClient, TransmissionClient $transmissionClient)
    {
        $this->tmdbClient = $tmdbClient;
        $this->transmissionClient = $transmissionClient;
    }

    /**
     * @Route("/tvshows", name="list_tvshows")
     */
    public function list(TorrentRepository $torrentRepository,
        TvSeasonRepository $tvSeasonRepository,
        TvEpisodeRepository $tvEpisodeRepository,
        SettingRepository $settingRepository): Response
    {
        $tvSeasons = $tvSeasonRepository->findBy(['status' => [ResourceStatus::DOWNLOADING, ResourceStatus::MISSING]]);
        $tvEpisodes = $tvEpisodeRepository->findBy(['status' => [ResourceStatus::DOWNLOADING, ResourceStatus::MISSING]]);
        $torrents = [];
        $tmdbTvSeasons = [];
        $tmdbTvEpisodes = [];
        $searchLocaleSetting = $settingRepository->findOneBy([
                'key' => Setting::SEARCH_LOCALE,
            ]) ?? 'fr';

        foreach ($tvSeasons as $tvSeason) {
            $torrent = $torrentRepository->findOneBy([
                'mediaType' => Torrent::TVSEASON_TYPE,
                'mediaId' => $tvSeason->getId(),
            ]);

            if ($torrent instanceof Torrent) {
                $transmissionTorrents = $this->transmissionClient->get($torrent->getHash())->first();

                if ($transmissionTorrents) {
                    $torrents[$tvSeason->getId()] = $transmissionTorrents;
                }
            }

            $_tmdbTvSeasons = $this->tmdbClient->getTvShowDetails($tvSeason->getTvShow()->getIdTmdb(), ['language' => $searchLocaleSetting])->getSeasons();

            foreach ($_tmdbTvSeasons as $tmdbTvSeason) {
                if ($tmdbTvSeason->getSeasonNumber() === $tvSeason->getNumber()) {
                    $tmdbTvSeasons[$tvSeason->getId()] = $tmdbTvSeason;
                    break;
                }
            }
        }

        foreach ($tvEpisodes as $tvEpisode) {
            $torrent = $torrentRepository->findOneBy([
                'mediaType' => Torrent::TVEPISODE_TYPE,
                'mediaId' => $tvEpisode->getId(),
            ]);

            if ($torrent instanceof Torrent) {
                $transmissionTorrents = $this->transmissionClient->get($torrent->getHash())->first();

                if ($transmissionTorrents) {
                    $torrents[$tvEpisode->getId()] = $transmissionTorrents;
                }
            }

            $tmdbTvEpisodes[$tvEpisode->getId()] = $this->tmdbClient->getTvShowEpisodeDetails(
                $tvEpisode->getShow()->getIdTmdb(),
                $tvEpisode->getSeason()->getNumber(),
                $tvEpisode->getNumber(),
                ['language' => $searchLocaleSetting]
            );
        }

        return $this->render('tv_shows/list.html.twig', [
            'tvSeasons' => $tvSeasons,
            'tmdbTvSeasons' => $tmdbTvSeasons,
            'tvEpisodes' => $tvEpisodes,
            'tmdbTvEpisodes' => $tmdbTvEpisodes,
            'torrents' => $torrents,
        ]);
    }

    /**
     * @Route("/tvshows/seasons/{tmdbId}", name="get_tvshow_seasons")
     */
    public function getTvShowSeasons(int $tmdbId,
        TvShowRepository $tvShowRepository,
        TvSeasonRepository $tvSeasonRepository,
        SettingRepository $settingRepository): Response
    {
        $searchLocaleSetting = $settingRepository->findOneBy([
                'key' => Setting::SEARCH_LOCALE,
            ]) ?? 'fr';
        $tmdbTvShow = $this->tmdbClient->getTvShowDetails($tmdbId, ['language' => $searchLocaleSetting]);
        if (!$tmdbTvShow instanceof TvTvIdGetResponse200) {
            throw $this->createNotFoundException(sprintf('TvShow #%s not found in TMDB', $tmdbId));
        }

        $tvShow = $tvShowRepository->findOneBy([
            'idTmdb' => $tmdbId,
        ]);
        $existingTvSeasons = [];

        foreach ($tmdbTvShow->getSeasons() as $season) {
            $tvSeason = $tvSeasonRepository->findOneBy([
                'tvShow' => $tvShow,
                'number' => $season->getSeasonNumber(),
            ]);

            if ($tvSeason instanceof TvSeason) {
                $existingTvSeasons[] = $tvSeason->getNumber();
            }
        }

        return $this->render('tv_shows/_modal_seasons.html.twig', [
            'tvShow' => $tmdbTvShow,
            'existingTvSeasons' => $existingTvSeasons,
        ]);
    }

    /**
     * @Route("/tvshows/season/add/{tmdbId}", name="add_tvseason")
     */
    public function addTvSeason(Request $request,
        int $tmdbId,
        TvShowRepository $tvShowRepository,
        SettingRepository $settingRepository): Response
    {
        $tvShow = $tvShowRepository->findOneBy(['idTmdb' => $tmdbId]);

        if (!$tvShow instanceof TvShow) {
            $searchLocaleSetting = $settingRepository->findOneBy([
                    'key' => Setting::SEARCH_LOCALE,
                ]) ?? 'fr';
            $tmdbTvShow = $this->tmdbClient->getTvShowDetails($tmdbId, ['language' => $searchLocaleSetting]);

            $tvShow = new TvShow();
            $tvShow->setIdTmdb($tmdbTvShow->getId())
                ->setTitle($tmdbTvShow->getName())
                ->setStatus(ResourceStatus::MISSING);

            $this->getDoctrine()->getManager()->persist($tvShow);
            $this->getDoctrine()->getManager()->flush();
        }

        $seasonNumbers = $request->request->get('seasons-numbers');

        foreach ($seasonNumbers as $seasonNumber) {
            $tvSeason = new TvSeason();
            $tvSeason->setTvShow($tvShow)
                ->setNumber($seasonNumber)
                ->setStatus(ResourceStatus::MISSING);
            $this->getDoctrine()->getManager()->persist($tvSeason);

            $this->dispatchMessage(new DownloadTvSeasonMessage($seasonNumber, $tvShow->getId()));
        }

        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'alert.success.tvshow_added');

        return $this->redirectToRoute('dashboard');
    }
}
