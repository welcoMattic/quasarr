<?php

namespace TMDB\API\Endpoint;

class SearchMovie extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
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
        return '/search/movie';
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
        $optionsResolver->setDefined(['query', 'page', 'year', 'primary_release_year', 'language']);
        $optionsResolver->setRequired(['query']);
        $optionsResolver->setDefaults(['language' => 'en-US']);
        $optionsResolver->setAllowedTypes('query', ['string']);
        $optionsResolver->setAllowedTypes('page', ['int']);
        $optionsResolver->setAllowedTypes('year', ['int']);
        $optionsResolver->setAllowedTypes('primary_release_year', ['int']);
        $optionsResolver->setAllowedTypes('language', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \TMDB\API\Exception\SearchMovieUnauthorizedException
     * @throws \TMDB\API\Exception\SearchMovieNotFoundException
     *
     * @return \TMDB\API\Model\SearchMovieGetResponse200|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && false !== mb_strpos($contentType, 'application/json')) {
            return $serializer->deserialize($body, 'TMDB\\API\\Model\\SearchMovieGetResponse200', 'json');
        }
        if (401 === $status && false !== mb_strpos($contentType, 'application/json')) {
            throw new \TMDB\API\Exception\SearchMovieUnauthorizedException($serializer->deserialize($body, 'TMDB\\API\\Model\\SearchMovieGetResponse401', 'json'));
        }
        if (404 === $status && false !== mb_strpos($contentType, 'application/json')) {
            throw new \TMDB\API\Exception\SearchMovieNotFoundException($serializer->deserialize($body, 'TMDB\\API\\Model\\SearchMovieGetResponse404', 'json'));
        }
    }
}
