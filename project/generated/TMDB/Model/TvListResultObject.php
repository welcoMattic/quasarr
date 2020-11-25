<?php

namespace TMDB\API\Model;

class TvListResultObject
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
     * @var float
     */
    protected $popularity;
    /**
     * 
     *
     * @var int
     */
    protected $id;
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
    protected $voteAverage;
    /**
     * 
     *
     * @var string
     */
    protected $overview;
    /**
     * 
     *
     * @var string[]
     */
    protected $originCountry;
    /**
     * 
     *
     * @var int[]
     */
    protected $genreIds;
    /**
     * 
     *
     * @var string
     */
    protected $originalLanguage;
    /**
     * 
     *
     * @var int
     */
    protected $voteCount;
    /**
     * 
     *
     * @var string
     */
    protected $name;
    /**
     * 
     *
     * @var string
     */
    protected $originalName;
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
     * @return string[]
     */
    public function getOriginCountry() : array
    {
        return $this->originCountry;
    }
    /**
     * 
     *
     * @param string[] $originCountry
     *
     * @return self
     */
    public function setOriginCountry(array $originCountry) : self
    {
        $this->originCountry = $originCountry;
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
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * 
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name) : self
    {
        $this->name = $name;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getOriginalName() : string
    {
        return $this->originalName;
    }
    /**
     * 
     *
     * @param string $originalName
     *
     * @return self
     */
    public function setOriginalName(string $originalName) : self
    {
        $this->originalName = $originalName;
        return $this;
    }
}