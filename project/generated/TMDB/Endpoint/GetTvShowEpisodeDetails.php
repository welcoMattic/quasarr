<?php

namespace TMDB\API\Endpoint;

class GetTvShowEpisodeDetails extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    protected $tv_id;
    protected $season_number;
    protected $episode_number;

    /**
     * Get the TV episode details by id.

    | **Date** | **Change** |.
     *
     * @param array $queryParameters {
     *
     *     @var string $language
     * }
     */
    public function __construct(int $tvId, int $seasonNumber, int $episodeNumber, array $queryParameters = [])
    {
        $this->tv_id = $tvId;
        $this->season_number = $seasonNumber;
        $this->episode_number = $episodeNumber;
        $this->queryParameters = $queryParameters;
    }

    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{tv_id}', '{season_number}', '{episode_number}'], [$this->tv_id, $this->season_number, $this->episode_number], '/tv/{tv_id}/season/{season_number}/episode/{episode_number}');
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
     * @throws \TMDB\API\Exception\GetTvShowEpisodeDetailsUnauthorizedException
     * @throws \TMDB\API\Exception\GetTvShowEpisodeDetailsNotFoundException
     *
     * @return \TMDB\API\Model\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200|null
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

    public function getAuthenticationScopes(): array
    {
        return ['api_key'];
    }
}
