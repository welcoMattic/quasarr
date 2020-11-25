<?php

namespace TMDB\API\Model;

class MovieMovieIdGetResponse200
{
    /**
     * 
     *
     * @var bool
     */
    protected $adult;
    /**
     * 
     *
     * @var string|null
     */
    protected $backdropPath;
    /**
     * 
     *
     * @var int
     */
    protected $budget;
    /**
     * 
     *
     * @var MovieMovieIdGetResponse200GenresItem[]
     */
    protected $genres;
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
    protected $originalLanguage;
    /**
     * 
     *
     * @var string
     */
    protected $originalTitle;
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
     * @var MovieMovieIdGetResponse200ProductionCompaniesItem[]
     */
    protected $productionCompanies;
    /**
     * 
     *
     * @var MovieMovieIdGetResponse200ProductionCountriesItem[]
     */
    protected $productionCountries;
    /**
     * 
     *
     * @var \DateTime
     */
    protected $releaseDate;
    /**
     * 
     *
     * @var int
     */
    protected $revenue;
    /**
     * 
     *
     * @var MovieMovieIdGetResponse200SpokenLanguagesItem[]
     */
    protected $spokenLanguages;
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
    protected $title;
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
     * @var int
     */
    protected $voteCount;
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
     * @return int
     */
    public function getBudget() : int
    {
        return $this->budget;
    }
    /**
     * 
     *
     * @param int $budget
     *
     * @return self
     */
    public function setBudget(int $budget) : self
    {
        $this->budget = $budget;
        return $this;
    }
    /**
     * 
     *
     * @return MovieMovieIdGetResponse200GenresItem[]
     */
    public function getGenres() : array
    {
        return $this->genres;
    }
    /**
     * 
     *
     * @param MovieMovieIdGetResponse200GenresItem[] $genres
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
     * @return MovieMovieIdGetResponse200ProductionCompaniesItem[]
     */
    public function getProductionCompanies() : array
    {
        return $this->productionCompanies;
    }
    /**
     * 
     *
     * @param MovieMovieIdGetResponse200ProductionCompaniesItem[] $productionCompanies
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
     * @return MovieMovieIdGetResponse200ProductionCountriesItem[]
     */
    public function getProductionCountries() : array
    {
        return $this->productionCountries;
    }
    /**
     * 
     *
     * @param MovieMovieIdGetResponse200ProductionCountriesItem[] $productionCountries
     *
     * @return self
     */
    public function setProductionCountries(array $productionCountries) : self
    {
        $this->productionCountries = $productionCountries;
        return $this;
    }
    /**
     * 
     *
     * @return \DateTime
     */
    public function getReleaseDate() : \DateTime
    {
        return $this->releaseDate;
    }
    /**
     * 
     *
     * @param \DateTime $releaseDate
     *
     * @return self
     */
    public function setReleaseDate(\DateTime $releaseDate) : self
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getRevenue() : int
    {
        return $this->revenue;
    }
    /**
     * 
     *
     * @param int $revenue
     *
     * @return self
     */
    public function setRevenue(int $revenue) : self
    {
        $this->revenue = $revenue;
        return $this;
    }
    /**
     * 
     *
     * @return MovieMovieIdGetResponse200SpokenLanguagesItem[]
     */
    public function getSpokenLanguages() : array
    {
        return $this->spokenLanguages;
    }
    /**
     * 
     *
     * @param MovieMovieIdGetResponse200SpokenLanguagesItem[] $spokenLanguages
     *
     * @return self
     */
    public function setSpokenLanguages(array $spokenLanguages) : self
    {
        $this->spokenLanguages = $spokenLanguages;
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