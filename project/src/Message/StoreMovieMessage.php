<?php

namespace Quasarr\Message;

final class StoreMovieMessage
{
    private $movieId;
    private $filepath;

    public function __construct(int $movieId, string $filepath)
    {
        $this->movieId = $movieId;
        $this->filepath = $filepath;
    }

    public function getMovieId(): string
    {
        return $this->movieId;
    }

    public function getFilepath(): string
    {
        return $this->filepath;
    }
}
