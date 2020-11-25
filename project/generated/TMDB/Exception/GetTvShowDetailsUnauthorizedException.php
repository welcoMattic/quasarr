<?php

namespace TMDB\API\Exception;

class GetTvShowDetailsUnauthorizedException extends \RuntimeException implements ClientException
{
    private $tvTvIdGetResponse401;
    public function __construct(\TMDB\API\Model\TvTvIdGetResponse401 $tvTvIdGetResponse401)
    {
        parent::__construct('', 401);
        $this->tvTvIdGetResponse401 = $tvTvIdGetResponse401;
    }
    public function getTvTvIdGetResponse401()
    {
        return $this->tvTvIdGetResponse401;
    }
}