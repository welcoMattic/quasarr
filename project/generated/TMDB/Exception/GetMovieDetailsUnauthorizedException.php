<?php

namespace TMDB\API\Exception;

class GetMovieDetailsUnauthorizedException extends \RuntimeException implements ClientException
{
    private $movieMovieIdGetResponse401;
    public function __construct(\TMDB\API\Model\MovieMovieIdGetResponse401 $movieMovieIdGetResponse401)
    {
        parent::__construct('', 401);
        $this->movieMovieIdGetResponse401 = $movieMovieIdGetResponse401;
    }
    public function getMovieMovieIdGetResponse401()
    {
        return $this->movieMovieIdGetResponse401;
    }
}