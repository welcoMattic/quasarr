<?php

namespace TMDB\API\Endpoint;

class GetTvShowDetails extends \TMDB\API\Runtime\Client\BaseEndpoint implements \TMDB\API\Runtime\Client\Endpoint
{
    protected $tv_id;
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
    */
    public function __construct(int $tvId, array $queryParameters = array())
    {
        $this->tv_id = $tvId;
        $this->queryParameters = $queryParameters;
    }
    use \TMDB\API\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{tv_id}'), array($this->tv_id), '/tv/{tv_id}');
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
     * @throws \TMDB\API\Exception\GetTvShowDetailsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowDetailsNotFoundException
     *
     * @return null|\TMDB\API\Model\TvTvIdGetResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdGetResponse200', 'json');
        }
        if (401 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\GetTvShowDetailsUnauthorizedException($serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdGetResponse401', 'json'));
        }
        if (404 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\GetTvShowDetailsNotFoundException($serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdGetResponse404', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('api_key');
    }
}