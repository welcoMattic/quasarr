<?php

namespace TMDB\API\Model;

class TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200
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
     * @var TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem[]
     */
    protected $crew;
    /**
     * 
     *
     * @var int
     */
    protected $episodeNumber;
    /**
     * 
     *
     * @var TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200GuestStarsItem[]
     */
    protected $guestStars;
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
     * @var int
     */
    protected $id;
    /**
     * 
     *
     * @var int
     */
    protected $seasonNumber;
    /**
     * 
     *
     * @var string|null
     */
    protected $stillPath;
    /**
     * 
     *
     * @var float
     */
    protected $voteAverage;
    /**
     * 
     *
     * @var int
     */
    protected $voteCount;
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
     * @return TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem[]
     */
    public function getCrew() : array
    {
        return $this->crew;
    }
    /**
     * 
     *
     * @param TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem[] $crew
     *
     * @return self
     */
    public function setCrew(array $crew) : self
    {
        $this->crew = $crew;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getEpisodeNumber() : int
    {
        return $this->episodeNumber;
    }
    /**
     * 
     *
     * @param int $episodeNumber
     *
     * @return self
     */
    public function setEpisodeNumber(int $episodeNumber) : self
    {
        $this->episodeNumber = $episodeNumber;
        return $this;
    }
    /**
     * 
     *
     * @return TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200GuestStarsItem[]
     */
    public function getGuestStars() : array
    {
        return $this->guestStars;
    }
    /**
     * 
     *
     * @param TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200GuestStarsItem[] $guestStars
     *
     * @return self
     */
    public function setGuestStars(array $guestStars) : self
    {
        $this->guestStars = $guestStars;
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
    /**
     * 
     *
     * @return string|null
     */
    public function getStillPath() : ?string
    {
        return $this->stillPath;
    }
    /**
     * 
     *
     * @param string|null $stillPath
     *
     * @return self
     */
    public function setStillPath(?string $stillPath) : self
    {
        $this->stillPath = $stillPath;
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
}