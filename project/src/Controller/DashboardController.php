<?php

namespace Quasarr\Controller;

use Quasarr\Entity\Movie;
use Quasarr\Enum\Setting;
use Quasarr\Repository\MovieRepository;
use Quasarr\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TMDB\API\Client;

class DashboardController extends AbstractController
{
    private $tmdbClient;

    public function __construct(Client $tmdbClient)
    {
        $this->tmdbClient = $tmdbClient;
    }

    /**
     * @Route("/", name="dashboard")
     */
    public function index(Request $request, MovieRepository $movieRepository, SettingRepository $settingRepository): Response
    {
        $searchLocaleSetting = $settingRepository->findOneBy([
            'key' => Setting::SEARCH_LOCALE,
        ]) ?? 'fr';

        if ($request->isMethod('POST')) {
            $search = $request->request->get('search');

            if (!$search) {
                return $this->redirectToRoute('dashboard');
            }

            $movies = $this->tmdbClient->searchMovie(['query' => $search, 'language' => $searchLocaleSetting->getValue()])->getResults();
            $tvShows = $this->tmdbClient->searchTvShow(['query' => $search, 'language' => $searchLocaleSetting->getValue()])->getResults();
        } else {
            $movies = $this->tmdbClient->getMoviePopulars(['language' => $searchLocaleSetting->getValue()])->getResults();
            $tvShows = $this->tmdbClient->getTvShowPopulars(['language' => $searchLocaleSetting->getValue()])->getResults();
        }

        $existingMovies = $movieRepository->findBy([
            'idTmdb' => array_map(function ($movie) {
                return $movie->getId();
            }, $movies),
        ]);
        $existingMovies = array_map(function (Movie $movie) {
            return $movie->getIdTmdb();
        }, $existingMovies);

        return $this->render('dashboard/index.html.twig', [
            'movies' => $movies ?? [],
            'tvShows' => $tvShows ?? [],
            'search' => $search ?? '',
            'existingMovies' => $existingMovies,
        ]);
    }
}
