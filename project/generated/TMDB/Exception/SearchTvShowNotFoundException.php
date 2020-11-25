<?php

namespace TMDB\API\Exception;

class SearchTvShowNotFoundException extends \RuntimeException implements ClientException
{
    private $searchTvGetResponse404;
    public function __construct(\TMDB\API\Model\SearchTvGetResponse404 $searchTvGetResponse404)
    {
        parent::__construct('', 404);
        $this->searchTvGetResponse404 = $searchTvGetResponse404;
    }
    public function getSearchTvGetResponse404()
    {
        return $this->searchTvGetResponse404;
    }
}