<?php

namespace TMDB\API\Model;

class SearchMovieGetResponse404
{
    /**
     * 
     *
     * @var string
     */
    protected $statusMessage;
    /**
     * 
     *
     * @var int
     */
    protected $statusCode;
    /**
     * 
     *
     * @return string
     */
    public function getStatusMessage() : string
    {
        return $this->statusMessage;
    }
    /**
     * 
     *
     * @param string $statusMessage
     *
     * @return self
     */
    public function setStatusMessage(string $statusMessage) : self
    {
        $this->statusMessage = $statusMessage;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }
    /**
     * 
     *
     * @param int $statusCode
     *
     * @return self
     */
    public function setStatusCode(int $statusCode) : self
    {
        $this->statusCode = $statusCode;
        return $this;
    }
}