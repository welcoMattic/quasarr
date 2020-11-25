<?php

namespace TMDB\API;

class Client extends \TMDB\API\Runtime\Client\Client
{
    /**
     * Search for movies.
     *
     * @param array $queryParameters {
     *     @var string $query 
     *     @var int $page 
     *     @var int $year 
     *     @var int $primary_release_year 
     *     @var string $language 
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \TMDB\API\Exception\SearchMovieUnauthorizedException
     * @throws \TMDB\API\Exception\SearchMovieNotFoundException
     *
     * @return null|\TMDB\API\Model\SearchMovieGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function searchMovie(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \TMDB\API\Endpoint\SearchMovie($queryParameters), $fetch);
    }
    /**
     * Search for a TV show.
     *
     * @param array $queryParameters {
     *     @var string $query 
     *     @var int $page 
     *     @var int $first_air_date_year 
     *     @var string $language 
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \TMDB\API\Exception\SearchTvShowUnauthorizedException
     * @throws \TMDB\API\Exception\SearchTvShowNotFoundException
     *
     * @return null|\TMDB\API\Model\SearchTvGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function searchTvShow(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \TMDB\API\Endpoint\SearchTvShow($queryParameters), $fetch);
    }
    /**
     * Get a list of the current popular movies on TMDb. This list updates daily.
     *
     * @param array $queryParameters {
     *     @var string $language 
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \TMDB\API\Exception\GetMoviePopularsUnauthorizedException
     * @throws \TMDB\API\Exception\GetMoviePopularsNotFoundException
     *
     * @return null|\TMDB\API\Model\MoviePopularGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function getMoviePopulars(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \TMDB\API\Endpoint\GetMoviePopulars($queryParameters), $fetch);
    }
    /**
     * Get a list of the current popular TV shows on TMDb. This list updates daily.
     *
     * @param array $queryParameters {
     *     @var string $language 
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \TMDB\API\Exception\GetTvShowPopularsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowPopularsNotFoundException
     *
     * @return null|\TMDB\API\Model\TvPopularGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function getTvShowPopulars(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \TMDB\API\Endpoint\GetTvShowPopulars($queryParameters), $fetch);
    }
    /**
    * Get the primary information about a movie.
    
    Supports `append_to_response`. Read more about this [here](#docTextSection:JdZq8ctmcxNqyLQjp).
    *
    * @param int $movieId 
    * @param array $queryParameters {
    *     @var string $language 
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \TMDB\API\Exception\GetMovieDetailsUnauthorizedException
    * @throws \TMDB\API\Exception\GetMovieDetailsNotFoundException
    *
    * @return null|\TMDB\API\Model\MovieMovieIdGetResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function getMovieDetails(int $movieId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \TMDB\API\Endpoint\GetMovieDetails($movieId, $queryParameters), $fetch);
    }
    /**
    * Get the primary TV show details by id.
    
    Supports `append_to_response`. Read more about this [here](#docTextSection:JdZq8ctmcxNqyLQjp).
    
    #### Recent Changes
    
    | **Date** | **Change** |
    | - | - |
    | July 17, 2018 | We now return `last_episode_to_air` and `next_episode_to_air` fields. |
    | March 12, 2018 | Networks return proper logos and we introduced SVG support. |
    | March 8, 2018 | The `seasons` field now returns the translated names and overviews. |
    *
    * @param int $tvId 
    * @param array $queryParameters {
    *     @var string $language 
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \TMDB\API\Exception\GetTvShowDetailsUnauthorizedException
    * @throws \TMDB\API\Exception\GetTvShowDetailsNotFoundException
    *
    * @return null|\TMDB\API\Model\TvTvIdGetResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function getTvShowDetails(int $tvId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \TMDB\API\Endpoint\GetTvShowDetails($tvId, $queryParameters), $fetch);
    }
    /**
    * Get the TV episode details by id.
    
    Supports `append_to_response`. Read more about this [here](#docTextSection:JdZq8ctmcxNqyLQjp).
    
    #### Recent Changes
    
    | **Date** | **Change** |
    | - | - |
    | June 1, 2018 | Added the [translations](#endpoint:5SFwZar3LkP99QMp7) method. |
    *
    * @param int $tvId 
    * @param int $seasonNumber 
    * @param int $episodeNumber 
    * @param array $queryParameters {
    *     @var string $language 
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \TMDB\API\Exception\GetTvShowEpisodeDetailsUnauthorizedException
    * @throws \TMDB\API\Exception\GetTvShowEpisodeDetailsNotFoundException
    *
    * @return null|\TMDB\API\Model\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200|\Psr\Http\Message\ResponseInterface
    */
    public function getTvShowEpisodeDetails(int $tvId, int $seasonNumber, int $episodeNumber, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \TMDB\API\Endpoint\GetTvShowEpisodeDetails($tvId, $seasonNumber, $episodeNumber, $queryParameters), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
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
        $serializer = new \Symfony\Component\Serializer\Serializer(array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \TMDB\API\Normalizer\JaneObjectNormalizer()), array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}