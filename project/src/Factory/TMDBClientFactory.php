<?php

namespace Quasarr\Factory;

use Jane\OpenApiRuntime\Client\Plugin\AuthenticationRegistry;
use TMDB\API\Authentication\ApiKeyAuthentication;
use TMDB\API\Client;

final class TMDBClientFactory
{
    /**
     * @var string
     */
    private $tmdbApiKey;

    public function __construct(string $tmdbApiKey)
    {
        $this->tmdbApiKey = $tmdbApiKey;
    }

    public function create(): Client
    {
        return Client::create(null, [new AuthenticationRegistry([new ApiKeyAuthentication($this->tmdbApiKey)])]);
    }
}
