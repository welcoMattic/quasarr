<?php

namespace TMDB\API\Exception;

class GetTvShowEpisodeDetailsNotFoundException extends \RuntimeException implements ClientException
{
    private $tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404;
    public function __construct(\TMDB\API\Model\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404 $tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404)
    {
        parent::__construct('', 404);
        $this->tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404 = $tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404;
    }
    public function getTvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404()
    {
        return $this->tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse404;
    }
}