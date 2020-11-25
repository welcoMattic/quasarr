<?php

namespace TMDB\API\Exception;

class GetMovieDetailsNotFoundException extends \RuntimeException implements ClientException
{
    private $movieMovieIdGetResponse404;
    public function __construct(\TMDB\API\Model\MovieMovieIdGetResponse404 $movieMovieIdGetResponse404)
    {
        parent::__construct('', 404);
        $this->movieMovieIdGetResponse404 = $movieMovieIdGetResponse404;
    }
    public function getMovieMovieIdGetResponse404()
    {
        return $this->movieMovieIdGetResponse404;
    }
}