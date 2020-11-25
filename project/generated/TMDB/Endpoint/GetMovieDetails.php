<?php

namespace TMDB\API\Endpoint;

class GetMovieDetails extends \TMDB\API\Runtime\Client\BaseEndpoint implements \TMDB\API\Runtime\Client\Endpoint
{
    protected $movie_id;
    /**
    * Get the primary information about a movie.
    
    Supports `append_to_response`. Read more about this [here](#docTextSection:JdZq8ctmcxNqyLQjp).
    *
    * @param int $movieId 
    * @param array $queryParameters {
    *     @var string $language 
    * }
    */
    public function __construct(int $movieId, array $queryParameters = array())
    {
        $this->movie_id = $movieId;
        $this->queryParameters = $queryParameters;
    }
    use \TMDB\API\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{movie_id}'), array($this->movie_id), '/movie/{movie_id}');
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
     * @throws \TMDB\API\Exception\GetMovieDetailsUnauthorizedException
     * @throws \TMDB\API\Exception\GetMovieDetailsNotFoundException
     *
     * @return null|\TMDB\API\Model\MovieMovieIdGetResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'TMDB\\API\\Model\\MovieMovieIdGetResponse200', 'json');
        }
        if (401 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\GetMovieDetailsUnauthorizedException($serializer->deserialize($body, 'TMDB\\API\\Model\\MovieMovieIdGetResponse401', 'json'));
        }
        if (404 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\GetMovieDetailsNotFoundException($serializer->deserialize($body, 'TMDB\\API\\Model\\MovieMovieIdGetResponse404', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('api_key');
    }
}