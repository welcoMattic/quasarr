<?php

namespace TMDB\API\Exception;

class GetTvShowPopularsUnauthorizedException extends \RuntimeException implements ClientException
{
    private $tvPopularGetResponse401;
    public function __construct(\TMDB\API\Model\TvPopularGetResponse401 $tvPopularGetResponse401)
    {
        parent::__construct('', 401);
        $this->tvPopularGetResponse401 = $tvPopularGetResponse401;
    }
    public function getTvPopularGetResponse401()
    {
        return $this->tvPopularGetResponse401;
    }
}