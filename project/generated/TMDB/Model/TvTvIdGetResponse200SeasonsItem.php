<?php

namespace TMDB\API\Model;

class TvTvIdGetResponse200SeasonsItem
{
    /**
     * 
     *
     * @var \DateTime|null
     */
    protected $airDate;
    /**
     * 
     *
     * @var int
     */
    protected $episodeCount;
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
    protected $name;
    /**
     * 
     *
     * @var string
     */
    protected $overview;
    /**
     * 
     *
     * @var string|null
     */
    protected $posterPath;
    /**
     * 
     *
     * @var int
     */
    protected $seasonNumber;
    /**
     * 
     *
     * @return \DateTime|null
     */
    public function getAirDate() : ?\DateTime
    {
        return $this->airDate;
    }
    /**
     * 
     *
     * @param \DateTime|null $airDate
     *
     * @return self
     */
    public function setAirDate(?\DateTime $airDate) : self
    {
        $this->airDate = $airDate;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getEpisodeCount() : int
    {
        return $this->episodeCount;
    }
    /**
     * 
     *
     * @param int $episodeCount
     *
     * @return self
     */
    public function setEpisodeCount(int $episodeCount) : self
    {
        $this->episodeCount = $episodeCount;
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
     * @return int
     */
    public function getSeasonNumber() : int
    {
        return $this->seasonNumber;
    }
    /**
     * 
     *
     * @param int $seasonNumber
     *
     * @return self
     */
    public function setSeasonNumber(int $seasonNumber) : self
    {
        $this->seasonNumber = $seasonNumber;
        return $this;
    }
}