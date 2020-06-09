<?php

namespace TMDB\API\Endpoint;

class SearchTvShow extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
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
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/search/tv';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['query', 'page', 'first_air_date_year', 'language']);
        $optionsResolver->setRequired(['query']);
        $optionsResolver->setDefaults(['language' => 'en-US']);
        $optionsResolver->setAllowedTypes('query', ['string']);
        $optionsResolver->setAllowedTypes('page', ['int']);
        $optionsResolver->setAllowedTypes('first_air_date_year', ['int']);
        $optionsResolver->setAllowedTypes('language', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \TMDB\API\Exception\SearchTvShowUnauthorizedException
     * @throws \TMDB\API\Exception\SearchTvShowNotFoundException
     *
     * @return \TMDB\API\Model\SearchTvGetResponse200|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && false !== mb_strpos($contentType, 'application/json')) {
            return $serializer->deserialize($body, 'TMDB\\API\\Model\\SearchTvGetResponse200', 'json');
        }
        if (401 === $status && false !== mb_strpos($contentType, 'application/json')) {
            throw new \TMDB\API\Exception\SearchTvShowUnauthorizedException($serializer->deserialize($body, 'TMDB\\API\\Model\\SearchTvGetResponse401', 'json'));
        }
        if (404 === $status && false !== mb_strpos($contentType, 'application/json')) {
            throw new \TMDB\API\Exception\SearchTvShowNotFoundException($serializer->deserialize($body, 'TMDB\\API\\Model\\SearchTvGetResponse404', 'json'));
        }
    }
}
