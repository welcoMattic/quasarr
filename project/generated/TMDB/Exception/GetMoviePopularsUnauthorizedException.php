<?php

namespace TMDB\API\Exception;

class GetMoviePopularsUnauthorizedException extends \RuntimeException implements ClientException
{
    private $moviePopularGetResponse401;
    public function __construct(\TMDB\API\Model\MoviePopularGetResponse401 $moviePopularGetResponse401)
    {
        parent::__construct('', 401);
        $this->moviePopularGetResponse401 = $moviePopularGetResponse401;
    }
    public function getMoviePopularGetResponse401()
    {
        return $this->moviePopularGetResponse401;
    }
}