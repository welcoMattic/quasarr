<?php

namespace TMDB\API\Endpoint;

class GetTvShowDetails extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    protected $tv_id;

    /**
     * Get the primary TV show details by id.

    | **Date** | **Change** |
     *
     * @param array $queryParameters {
     *
     *     @var string $language
     * }
     */
    public function __construct(int $tvId, array $queryParameters = [])
    {
        $this->tv_id = $tvId;
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{tv_id}'], [$this->tv_id], '/tv/{tv_id}');
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
        $optionsResolver->setDefined(['language']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['language' => 'en-US']);
        $optionsResolver->setAllowedTypes('language', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \TMDB\API\Exception\GetTvShowDetailsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowDetailsNotFoundException
     *
     * @return \TMDB\API\Model\TvTvIdGetResponse200|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && false !== mb_strpos($contentType, 'application/json')) {
            return $serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdGetResponse200', 'json');
        }
        if (401 === $status && false !== mb_strpos($contentType, 'application/json')) {
            throw new \TMDB\API\Exception\GetTvShowDetailsUnauthorizedException($serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdGetResponse401', 'json'));
        }
        if (404 === $status && false !== mb_strpos($contentType, 'application/json')) {
            throw new \TMDB\API\Exception\GetTvShowDetailsNotFoundException($serializer->deserialize($body, 'TMDB\\API\\Model\\TvTvIdGetResponse404', 'json'));
        }
    }
}
