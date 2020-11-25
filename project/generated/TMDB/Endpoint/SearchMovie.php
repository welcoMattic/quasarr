<?php

namespace TMDB\API\Endpoint;

class SearchMovie extends \TMDB\API\Runtime\Client\BaseEndpoint implements \TMDB\API\Runtime\Client\Endpoint
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
     */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    use \TMDB\API\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/search/movie';
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
        $optionsResolver->setDefined(array('query', 'page', 'year', 'primary_release_year', 'language'));
        $optionsResolver->setRequired(array('query'));
        $optionsResolver->setDefaults(array('language' => 'en-US'));
        $optionsResolver->setAllowedTypes('query', array('string'));
        $optionsResolver->setAllowedTypes('page', array('int'));
        $optionsResolver->setAllowedTypes('year', array('int'));
        $optionsResolver->setAllowedTypes('primary_release_year', array('int'));
        $optionsResolver->setAllowedTypes('language', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TMDB\API\Exception\SearchMovieUnauthorizedException
     * @throws \TMDB\API\Exception\SearchMovieNotFoundException
     *
     * @return null|\TMDB\API\Model\SearchMovieGetResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'TMDB\\API\\Model\\SearchMovieGetResponse200', 'json');
        }
        if (401 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\SearchMovieUnauthorizedException($serializer->deserialize($body, 'TMDB\\API\\Model\\SearchMovieGetResponse401', 'json'));
        }
        if (404 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\SearchMovieNotFoundException($serializer->deserialize($body, 'TMDB\\API\\Model\\SearchMovieGetResponse404', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('api_key');
    }
}