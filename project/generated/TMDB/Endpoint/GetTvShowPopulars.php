<?php

namespace TMDB\API\Endpoint;

class GetTvShowPopulars extends \TMDB\API\Runtime\Client\BaseEndpoint implements \TMDB\API\Runtime\Client\Endpoint
{
    /**
     * Get a list of the current popular TV shows on TMDb. This list updates daily.
     *
     * @param array $queryParameters {
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
        return '/tv/popular';
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
     * @throws \TMDB\API\Exception\GetTvShowPopularsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowPopularsNotFoundException
     *
     * @return null|\TMDB\API\Model\TvPopularGetResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'TMDB\\API\\Model\\TvPopularGetResponse200', 'json');
        }
        if (401 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\GetTvShowPopularsUnauthorizedException($serializer->deserialize($body, 'TMDB\\API\\Model\\TvPopularGetResponse401', 'json'));
        }
        if (404 === $status && mb_strpos($contentType, 'application/json') !== false) {
            throw new \TMDB\API\Exception\GetTvShowPopularsNotFoundException($serializer->deserialize($body, 'TMDB\\API\\Model\\TvPopularGetResponse404', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('api_key');
    }
}