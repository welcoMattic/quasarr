<?php

namespace Quasarr\Message;

final class StoreTvEpisodeMessage
{
    private $tvEpisodeId;
    private $filepath;

    public function __construct(int $tvEpisodeId, string $filepath)
    {
        $this->tvEpisodeId = $tvEpisodeId;
        $this->filepath = $filepath;
    }

    public function getTvEpisodeId(): string
    {
        return $this->tvEpisodeId;
    }

    public function getFilepath(): string
    {
        return $this->filepath;
    }
}
