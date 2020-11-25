<?php

namespace TMDB\API\Model;

class TvTvIdGetResponse200
{
    /**
     * 
     *
     * @var string|null
     */
    protected $backdropPath;
    /**
     * 
     *
     * @var TvTvIdGetResponse200CreatedByItem[]
     */
    protected $createdBy;
    /**
     * 
     *
     * @var int[]
     */
    protected $episodeRunTime;
    /**
     * 
     *
     * @var TvTvIdGetResponse200GenresItem[]
     */
    protected $genres;
    /**
     * 
     *
     * @var string
     */
    protected $homepage;
    /**
     * 
     *
     * @var int
     */
    protected $id;
    /**
     * 
     *
     * @var bool
     */
    protected $inProduction;
    /**
     * 
     *
     * @var string[]
     */
    protected $languages;
    /**
     * 
     *
     * @var \DateTime|null
     */
    protected $lastAirDate;
    /**
     * 
     *
     * @var TvTvIdGetResponse200LastEpisodeToAir
     */
    protected $lastEpisodeToAir;
    /**
     * 
     *
     * @var string
     */
    protected $name;
    /**
     * 
     *
     * @var TvTvIdGetResponse200NetworksItem[]
     */
    protected $networks;
    /**
     * 
     *
     * @var int
     */
    protected $numberOfEpisodes;
    /**
     * 
     *
     * @var int
     */
    protected $numberOfSeasons;
    /**
     * 
     *
     * @var string[]
     */
    protected $originCountry;
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
    protected $originalName;
    /**
     * 
     *
     * @var string
     */
    protected $overview;
    /**
     * 
     *
     * @var float
     */
    protected $popularity;
    /**
     * 
     *
     * @var string|null
     */
    protected $posterPath;
    /**
     * 
     *
     * @var TvTvIdGetResponse200ProductionCompaniesItem[]
     */
    protected $productionCompanies;
    /**
     * 
     *
     * @var TvTvIdGetResponse200SeasonsItem[]
     */
    protected $seasons;
    /**
     * 
     *
     * @var string
     */
    protected $status;
    /**
     * 
     *
     * @var string
     */
    protected $type;
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
     * @return TvTvIdGetResponse200CreatedByItem[]
     */
    public function getCreatedBy() : array
    {
        return $this->createdBy;
    }
    /**
     * 
     *
     * @param TvTvIdGetResponse200CreatedByItem[] $createdBy
     *
     * @return self
     */
    public function setCreatedBy(array $createdBy) : self
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * 
     *
     * @return int[]
     */
    public function getEpisodeRunTime() : array
    {
        return $this->episodeRunTime;
    }
    /**
     * 
     *
     * @param int[] $episodeRunTime
     *
     * @return self
     */
    public function setEpisodeRunTime(array $episodeRunTime) : self
    {
        $this->episodeRunTime = $episodeRunTime;
        return $this;
    }
    /**
     * 
     *
     * @return TvTvIdGetResponse200GenresItem[]
     */
    public function getGenres() : array
    {
        return $this->genres;
    }
    /**
     * 
     *
     * @param TvTvIdGetResponse200GenresItem[] $genres
     *
     * @return self
     */
    public function setGenres(array $genres) : self
    {
        $this->genres = $genres;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getHomepage() : string
    {
        return $this->homepage;
    }
    /**
     * 
     *
     * @param string $homepage
     *
     * @return self
     */
    public function setHomepage(string $homepage) : self
    {
        $this->homepage = $homepage;
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
     * @return bool
     */
    public function getInProduction() : bool
    {
        return $this->inProduction;
    }
    /**
     * 
     *
     * @param bool $inProduction
     *
     * @return self
     */
    public function setInProduction(bool $inProduction) : self
    {
        $this->inProduction = $inProduction;
        return $this;
    }
    /**
     * 
     *
     * @return string[]
     */
    public function getLanguages() : array
    {
        return $this->languages;
    }
    /**
     * 
     *
     * @param string[] $languages
     *
     * @return self
     */
    public function setLanguages(array $languages) : self
    {
        $this->languages = $languages;
        return $this;
    }
    /**
     * 
     *
     * @return \DateTime|null
     */
    public function getLastAirDate() : ?\DateTime
    {
        return $this->lastAirDate;
    }
    /**
     * 
     *
     * @param \DateTime|null $lastAirDate
     *
     * @return self
     */
    public function setLastAirDate(?\DateTime $lastAirDate) : self
    {
        $this->lastAirDate = $lastAirDate;
        return $this;
    }
    /**
     * 
     *
     * @return TvTvIdGetResponse200LastEpisodeToAir
     */
    public function getLastEpisodeToAir() : TvTvIdGetResponse200LastEpisodeToAir
    {
        return $this->lastEpisodeToAir;
    }
    /**
     * 
     *
     * @param TvTvIdGetResponse200LastEpisodeToAir $lastEpisodeToAir
     *
     * @return self
     */
    public function setLastEpisodeToAir(TvTvIdGetResponse200LastEpisodeToAir $lastEpisodeToAir) : self
    {
        $this->lastEpisodeToAir = $lastEpisodeToAir;
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
     * @return TvTvIdGetResponse200NetworksItem[]
     */
    public function getNetworks() : array
    {
        return $this->networks;
    }
    /**
     * 
     *
     * @param TvTvIdGetResponse200NetworksItem[] $networks
     *
     * @return self
     */
    public function setNetworks(array $networks) : self
    {
        $this->networks = $networks;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getNumberOfEpisodes() : int
    {
        return $this->numberOfEpisodes;
    }
    /**
     * 
     *
     * @param int $numberOfEpisodes
     *
     * @return self
     */
    public function setNumberOfEpisodes(int $numberOfEpisodes) : self
    {
        $this->numberOfEpisodes = $numberOfEpisodes;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getNumberOfSeasons() : int
    {
        return $this->numberOfSeasons;
    }
    /**
     * 
     *
     * @param int $numberOfSeasons
     *
     * @return self
     */
    public function setNumberOfSeasons(int $numberOfSeasons) : self
    {
        $this->numberOfSeasons = $numberOfSeasons;
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
     * @return TvTvIdGetResponse200ProductionCompaniesItem[]
     */
    public function getProductionCompanies() : array
    {
        return $this->productionCompanies;
    }
    /**
     * 
     *
     * @param TvTvIdGetResponse200ProductionCompaniesItem[] $productionCompanies
     *
     * @return self
     */
    public function setProductionCompanies(array $productionCompanies) : self
    {
        $this->productionCompanies = $productionCompanies;
        return $this;
    }
    /**
     * 
     *
     * @return TvTvIdGetResponse200SeasonsItem[]
     */
    public function getSeasons() : array
    {
        return $this->seasons;
    }
    /**
     * 
     *
     * @param TvTvIdGetResponse200SeasonsItem[] $seasons
     *
     * @return self
     */
    public function setSeasons(array $seasons) : self
    {
        $this->seasons = $seasons;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }
    /**
     * 
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status) : self
    {
        $this->status = $status;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }
    /**
     * 
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type) : self
    {
        $this->type = $type;
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