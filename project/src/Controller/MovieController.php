<?php

namespace Quasarr\Controller;

use Quasarr\Entity\Movie;
use Quasarr\Entity\Torrent;
use Quasarr\Enum\ResourceStatus;
use Quasarr\Enum\Setting;
use Quasarr\Message\DownloadMovieMessage;
use Quasarr\Repository\MovieRepository;
use Quasarr\Repository\SettingRepository;
use Quasarr\Repository\TorrentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TMDB\API\Client;
use TMDB\API\Model\MovieMovieIdGetResponse200;
use Transmission\Client as TransmissionClient;

class MovieController extends AbstractController
{
    private $tmdbClient;
    private $transmissionClient;

    public function __construct(Client $tmdbClient, TransmissionClient $transmissionClient)
    {
        $this->tmdbClient = $tmdbClient;
        $this->transmissionClient = $transmissionClient;
    }

    /**
     * @Route("/movies", name="list_movies")
     */
    public function list(TorrentRepository $torrentRepository, MovieRepository $movieRepository, SettingRepository $settingRepository): Response
    {
        $movies = $movieRepository->findBy(['status' => [ResourceStatus::MISSING, ResourceStatus::DOWNLOADING, ResourceStatus::DOWNLOADED]]);
        $torrents = [];
        $tmdbMovies = [];
        $searchLocaleSetting = $settingRepository->findOneBy([
            'key' => Setting::SEARCH_LOCALE,
        ]) ?? 'fr';

        foreach ($movies as $movie) {
            $torrent = $torrentRepository->findOneBy([
                'mediaType' => Torrent::MOVIE_TYPE,
                'mediaId' => $movie->getId(),
            ]);

            if ($torrent instanceof Torrent) {
                $transmissionTorrents = $this->transmissionClient->get($torrent->getHash())->first();

                if ($transmissionTorrents) {
                    $torrents[$movie->getId()] = $transmissionTorrents;
                }
            }

            $tmdbMovies[$movie->getId()] = $this->tmdbClient->getMovieDetails($movie->getIdTmdb(), ['language' => $searchLocaleSetting]);
        }

        return $this->render('movies/list.html.twig', [
            'movies' => $movies,
            'tmdbMovies' => $tmdbMovies,
            'torrents' => $torrents,
        ]);
    }

    /**
     * @Route("/movies/add/{tmdbId}", name="add_movie")
     */
    public function addMovie(int $tmdbId, MovieRepository $movieRepository, SettingRepository $settingRepository): Response
    {
        $searchLocaleSetting = $settingRepository->findOneBy([
                'key' => Setting::SEARCH_LOCALE,
            ]) ?? 'fr';
        $tmdbMovie = $this->tmdbClient->getMovieDetails($tmdbId, ['language' => $searchLocaleSetting]);
        if (!$tmdbMovie instanceof MovieMovieIdGetResponse200) {
            throw $this->createNotFoundException(sprintf('Movie #%s not found in TMDB', $tmdbId));
        }

        $movie = $movieRepository->findOneBy(['idTmdb' => $tmdbId]);

        if ($movie instanceof Movie) {
            $this->addFlash('info', 'alert.info.movie_exists');

            return $this->redirectToRoute('dashboard');
        } else {
            $movie = new Movie();
            $movie->setIdTmdb($tmdbMovie->getId())
                ->setTitle($tmdbMovie->getTitle())
                ->setStatus(ResourceStatus::MISSING);

            $this->getDoctrine()->getManager()->persist($movie);
        }

        $this->dispatchMessage(new DownloadMovieMessage($movie->getId()));

        $this->getDoctrine()->getManager()->flush();
        $this->addFlash('success', 'alert.success.movie_added');

        return $this->redirectToRoute('dashboard');
    }
}
