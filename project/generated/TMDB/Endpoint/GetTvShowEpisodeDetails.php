<?php

namespace TMDB\API\Endpoint;

class GetTvShowEpisodeDetails extends \TMDB\API\Runtime\Client\BaseEndpoint implements \TMDB\API\Runtime\Client\Endpoint
{
    protected $tv_id;
    protected $season_number;
    protected $episode_number;
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
    */
    public function __construct(int $tvId, int $seasonNumber, int $episodeNumber, array $queryParameters = array())
    {
        $this->tv_id = $tvId;
        $this->season_number = $seasonNumber;
        $this->episode_number = $episodeNumber;
        $this->queryParameters = $queryParameters;
    }
    use \TMDB\API\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{tv_id}', '{season_number}', '{episode_number}'), array($this->tv_id, $this->season_number, $this->episode_number), '/tv/{tv_id}/season/{season_number}/episode/{episode_number}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('language'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('language' => 'en-US'));
        $optionsResolver->setAllowedTypes('language', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TMDB\API\Exception\GetTvShowEpisodeDetailsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowEpisodeDetailsNotFoundException
     *
     * @return null|\TMDB\API\Model\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200', 'json');
        }
        if (401 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\GetTvShowEpisodeDetailsUnauthorizedException($serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401', 'json'));
        }
        if (404 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\GetTvShowEpisodeDetailsNotFoundException($serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('api_key');
    }
}