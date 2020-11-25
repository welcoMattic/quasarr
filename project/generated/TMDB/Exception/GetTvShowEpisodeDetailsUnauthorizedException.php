<?php

namespace TMDB\API\Exception;

class GetTvShowEpisodeDetailsUnauthorizedException extends \RuntimeException implements ClientException
{
    private $tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401;
    public function __construct(\TMDB\API\Model\TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401 $tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401)
    {
        parent::__construct('', 401);
        $this->tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401 = $tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401;
    }
    public function getTvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401()
    {
        return $this->tvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse401;
    }
}