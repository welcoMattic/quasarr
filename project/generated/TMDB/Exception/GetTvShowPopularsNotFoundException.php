<?php

namespace TMDB\API\Exception;

class GetTvShowPopularsNotFoundException extends \RuntimeException implements ClientException
{
    private $tvPopularGetResponse404;
    public function __construct(\TMDB\API\Model\TvPopularGetResponse404 $tvPopularGetResponse404)
    {
        parent::__construct('', 404);
        $this->tvPopularGetResponse404 = $tvPopularGetResponse404;
    }
    public function getTvPopularGetResponse404()
    {
        return $this->tvPopularGetResponse404;
    }
}