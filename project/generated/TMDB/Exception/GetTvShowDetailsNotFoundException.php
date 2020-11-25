<?php

namespace TMDB\API\Exception;

class GetTvShowDetailsNotFoundException extends \RuntimeException implements ClientException
{
    private $tvTvIdGetResponse404;
    public function __construct(\TMDB\API\Model\TvTvIdGetResponse404 $tvTvIdGetResponse404)
    {
        parent::__construct('', 404);
        $this->tvTvIdGetResponse404 = $tvTvIdGetResponse404;
    }
    public function getTvTvIdGetResponse404()
    {
        return $this->tvTvIdGetResponse404;
    }
}