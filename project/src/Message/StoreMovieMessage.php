<?php

namespace Quasarr\Message;

final class StoreMovieMessage
{
    private $id;
    private $filepath;

    public function __construct(int $id, string $filepath)
    {
        $this->id = $id;
        $this->filepath = $filepath;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFilepath(): string
    {
        return $this->filepath;
    }

    public function setFilepath(string $filepath)
    {
        $this->filepath = $filepath;

        return $this;
    }
}
