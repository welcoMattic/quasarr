<?php

namespace TMDB\API\Exception;

class SearchMovieNotFoundException extends \RuntimeException implements ClientException
{
    private $searchMovieGetResponse404;
    public function __construct(\TMDB\API\Model\SearchMovieGetResponse404 $searchMovieGetResponse404)
    {
        parent::__construct('', 404);
        $this->searchMovieGetResponse404 = $searchMovieGetResponse404;
    }
    public function getSearchMovieGetResponse404()
    {
        return $this->searchMovieGetResponse404;
    }
}