<?php

namespace TMDB\API\Model;

class MovieListObject
{
    /**
     * 
     *
     * @var string|null
     */
    protected $posterPath;
    /**
     * 
     *
     * @var bool
     */
    protected $adult;
    /**
     * 
     *
     * @var string
     */
    protected $overview;
    /**
     * 
     *
     * @var string
     */
    protected $releaseDate;
    /**
     * 
     *
     * @var int[]
     */
    protected $genreIds;
    /**
     * 
     *
     * @var int
     */
    protected $id;
    /**
     * 
     *
     * @var string
     */
    protected $originalTitle;
    /**
     * 
     *
     * @var string
     */
    protected $originalLanguage;
    /**
     * 
     *
     * @var string
     */
    protected $title;
    /**
     * 
     *
     * @var string|null
     */
    protected $backdropPath;
    /**
     * 
     *
     * @var float
     */
    protected $popularity;
    /**
     * 
     *
     * @var int
     */
    protected $voteCount;
    /**
     * 
     *
     * @var bool
     */
    protected $video;
    /**
     * 
     *
     * @var float
     */
    protected $voteAverage;
    /**
     * 
     *
     * @return string|null
     */
    public function getPosterPath() : ?string
    {
        return $this->posterPath;
    }
    /**
     * 
     *
     * @param string|null $posterPath
     *
     * @return self
     */
    public function setPosterPath(?string $posterPath) : self
    {
        $this->posterPath = $posterPath;
        return $this;
    }
    /**
     * 
     *
     * @return bool
     */
    public function getAdult() : bool
    {
        return $this->adult;
    }
    /**
     * 
     *
     * @param bool $adult
     *
     * @return self
     */
    public function setAdult(bool $adult) : self
    {
        $this->adult = $adult;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getOverview() : string
    {
        return $this->overview;
    }
    /**
     * 
     *
     * @param string $overview
     *
     * @return self
     */
    public function setOverview(string $overview) : self
    {
        $this->overview = $overview;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getReleaseDate() : string
    {
        return $this->releaseDate;
    }
    /**
     * 
     *
     * @param string $releaseDate
     *
     * @return self
     */
    public function setReleaseDate(string $releaseDate) : self
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }
    /**
     * 
     *
     * @return int[]
     */
    public function getGenreIds() : array
    {
        return $this->genreIds;
    }
    /**
     * 
     *
     * @param int[] $genreIds
     *
     * @return self
     */
    public function setGenreIds(array $genreIds) : self
    {
        $this->genreIds = $genreIds;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }
    /**
     * 
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getOriginalTitle() : string
    {
        return $this->originalTitle;
    }
    /**
     * 
     *
     * @param string $originalTitle
     *
     * @return self
     */
    public function setOriginalTitle(string $originalTitle) : self
    {
        $this->originalTitle = $originalTitle;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getOriginalLanguage() : string
    {
        return $this->originalLanguage;
    }
    /**
     * 
     *
     * @param string $originalLanguage
     *
     * @return self
     */
    public function setOriginalLanguage(string $originalLanguage) : self
    {
        $this->originalLanguage = $originalLanguage;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }
    /**
     * 
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title) : self
    {
        $this->title = $title;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getBackdropPath() : ?string
    {
        return $this->backdropPath;
    }
    /**
     * 
     *
     * @param string|null $backdropPath
     *
     * @return self
     */
    public function setBackdropPath(?string $backdropPath) : self
    {
        $this->backdropPath = $backdropPath;
        return $this;
    }
    /**
     * 
     *
     * @return float
     */
    public function getPopularity() : float
    {
        return $this->popularity;
    }
    /**
     * 
     *
     * @param float $popularity
     *
     * @return self
     */
    public function setPopularity(float $popularity) : self
    {
        $this->popularity = $popularity;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getVoteCount() : int
    {
        return $this->voteCount;
    }
    /**
     * 
     *
     * @param int $voteCount
     *
     * @return self
     */
    public function setVoteCount(int $voteCount) : self
    {
        $this->voteCount = $voteCount;
        return $this;
    }
    /**
     * 
     *
     * @return bool
     */
    public function getVideo() : bool
    {
        return $this->video;
    }
    /**
     * 
     *
     * @param bool $video
     *
     * @return self
     */
    public function setVideo(bool $video) : self
    {
        $this->video = $video;
        return $this;
    }
    /**
     * 
     *
     * @return float
     */
    public function getVoteAverage() : float
    {
        return $this->voteAverage;
    }
    /**
     * 
     *
     * @param float $voteAverage
     *
     * @return self
     */
    public function setVoteAverage(float $voteAverage) : self
    {
        $this->voteAverage = $voteAverage;
        return $this;
    }
}