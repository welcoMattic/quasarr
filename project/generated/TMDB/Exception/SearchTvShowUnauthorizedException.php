<?php

namespace TMDB\API\Exception;

class SearchTvShowUnauthorizedException extends \RuntimeException implements ClientException
{
    private $searchTvGetResponse401;
    public function __construct(\TMDB\API\Model\SearchTvGetResponse401 $searchTvGetResponse401)
    {
        parent::__construct('', 401);
        $this->searchTvGetResponse401 = $searchTvGetResponse401;
    }
    public function getSearchTvGetResponse401()
    {
        return $this->searchTvGetResponse401;
    }
}