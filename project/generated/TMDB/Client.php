<?php

namespace TMDB\API;

class Client extends \Jane\OpenApiRuntime\Client\Psr18Client
{
    /**
     * Search for movies.
     *
     * @param array $queryParameters {
     *
     *     @var string $query
     *     @var int $page
     *     @var int $year
     *     @var int $primary_release_year
     *     @var string $language
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \TMDB\API\Exception\SearchMovieUnauthorizedException
     * @throws \TMDB\API\Exception\SearchMovieNotFoundException
     *
     * @return \TMDB\API\Model\SearchMovieGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function searchMovie(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \TMDB\API\Endpoint\SearchMovie($queryParameters), $fetch);
    }

    /**
     * Search for a TV show.
     *
     * @param array $queryParameters {
     *
     *     @var string $query
     *     @var int $page
     *     @var int $first_air_date_year
     *     @var string $language
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \TMDB\API\Exception\SearchTvShowUnauthorizedException
     * @throws \TMDB\API\Exception\SearchTvShowNotFoundException
     *
     * @return \TMDB\API\Model\SearchTvGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function searchTvShow(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \TMDB\API\Endpoint\SearchTvShow($queryParameters), $fetch);
    }

    /**
     * Get a list of the current popular movies on TMDb. This list updates daily.
     *
     * @param array $queryParameters {
     *
     *     @var string $language
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \TMDB\API\Exception\GetMoviePopularsUnauthorizedException
     * @throws \TMDB\API\Exception\GetMoviePopularsNotFoundException
     *
     * @return \TMDB\API\Model\MoviePopularGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function getMoviePopulars(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \TMDB\API\Endpoint\GetMoviePopulars($queryParameters), $fetch);
    }

    /**
     * Get a list of the current popular TV shows on TMDb. This list updates daily.
     *
     * @param array $queryParameters {
     *
     *     @var string $language
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \TMDB\API\Exception\GetTvShowPopularsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowPopularsNotFoundException
     *
     * @return \TMDB\API\Model\TvPopularGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function getTvShowPopulars(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \TMDB\API\Endpoint\GetTvShowPopulars($queryParameters), $fetch);
    }

    /**
     * Get the primary information about a movie.
     *
     * @param array $queryParameters {
     *
     *     @var string $language
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \TMDB\API\Exception\GetMovieDetailsUnauthorizedException
     * @throws \TMDB\API\Exception\GetMovieDetailsNotFoundException
     *
     * @return \TMDB\API\Model\MovieMovieIdGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function getMovieDetails(int $movieId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \TMDB\API\Endpoint\GetMovieDetails($movieId, $queryParameters), $fetch);
    }

    /**
     * Get the primary TV show details by id.

    | **Date** | **Change** |.
     *
     * @param array $queryParameters {
     *
     *     @var string $language
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \TMDB\API\Exception\GetTvShowDetailsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowDetailsNotFoundException
     *
     * @return \TMDB\API\Model\TvTvIdGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function getTvShowDetails(int $tvId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \TMDB\API\Endpoint\GetTvShowDetails($tvId, $queryParameters), $fetch);
    }

    /**
     * Get the TV episode details by id.

    | **Date** | **Change** |.
     *
     * @param array $queryParameters {
     *
     *     @var string $language
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \TMDB\API\Exception\GetTvShowEpisodeDetailsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowEpisodeDetailsNotFoundException
     *
     * @return \TMDB\API\Model\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200|\Psr\Http\Message\ResponseInterface|null
     */
    public function getTvShowEpisodeDetails(int $tvId, int $seasonNumber, int $episodeNumber, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new \TMDB\API\Endpoint\GetTvShowEpisodeDetails($tvId, $seasonNumber, $episodeNumber, $queryParameters), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [])
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://api.themoviedb.org/3');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer = new \Symfony\Component\Serializer\Serializer([new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \TMDB\API\Normalizer\JaneObjectNormalizer()], [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
