<?php

namespace TMDB\API\Exception;

class SearchMovieUnauthorizedException extends \RuntimeException implements ClientException
{
    private $searchMovieGetResponse401;
    public function __construct(\TMDB\API\Model\SearchMovieGetResponse401 $searchMovieGetResponse401)
    {
        parent::__construct('', 401);
        $this->searchMovieGetResponse401 = $searchMovieGetResponse401;
    }
    public function getSearchMovieGetResponse401()
    {
        return $this->searchMovieGetResponse401;
    }
}