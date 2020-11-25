<?php

namespace TMDB\API\Exception;

class GetMoviePopularsNotFoundException extends \RuntimeException implements ClientException
{
    private $moviePopularGetResponse404;
    public function __construct(\TMDB\API\Model\MoviePopularGetResponse404 $moviePopularGetResponse404)
    {
        parent::__construct('', 404);
        $this->moviePopularGetResponse404 = $moviePopularGetResponse404;
    }
    public function getMoviePopularGetResponse404()
    {
        return $this->moviePopularGetResponse404;
    }
}