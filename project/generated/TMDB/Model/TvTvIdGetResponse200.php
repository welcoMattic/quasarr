<?php

namespace TMDB\API\Model;

class TvTvIdGetResponse200
{
    /**
     * @var string|null
     */
    protected $backdropPath;
    /**
     * @var TvTvIdGetResponse200CreatedByItem[]
     */
    protected $createdBy;
    /**
     * @var int[]
     */
    protected $episodeRunTime;
    /**
     * @var TvTvIdGetResponse200GenresItem[]
     */
    protected $genres;
    /**
     * @var string
     */
    protected $homepage;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var bool
     */
    protected $inProduction;
    /**
     * @var string[]
     */
    protected $languages;
    /**
     * @var \DateTime|null
     */
    protected $lastAirDate;
    /**
     * @var TvTvIdGetResponse200LastEpisodeToAir
     */
    protected $lastEpisodeToAir;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var TvTvIdGetResponse200NetworksItem[]
     */
    protected $networks;
    /**
     * @var int
     */
    protected $numberOfEpisodes;
    /**
     * @var int
     */
    protected $numberOfSeasons;
    /**
     * @var string[]
     */
    protected $originCountry;
    /**
     * @var string
     */
    protected $originalLanguage;
    /**
     * @var string
     */
    protected $originalName;
    /**
     * @var string
     */
    protected $overview;
    /**
     * @var float
     */
    protected $popularity;
    /**
     * @var string|null
     */
    protected $posterPath;
    /**
     * @var TvTvIdGetResponse200ProductionCompaniesItem[]
     */
    protected $productionCompanies;
    /**
     * @var TvTvIdGetResponse200SeasonsItem[]
     */
    protected $seasons;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var float
     */
    protected $voteAverage;
    /**
     * @var int
     */
    protected $voteCount;

    public function getBackdropPath(): ?string
    {
        return $this->backdropPath;
    }

    public function setBackdropPath(?string $backdropPath): self
    {
        $this->backdropPath = $backdropPath;

        return $this;
    }

    /**
     * @return TvTvIdGetResponse200CreatedByItem[]
     */
    public function getCreatedBy(): array
    {
        return $this->createdBy;
    }

    /**
     * @param TvTvIdGetResponse200CreatedByItem[] $createdBy
     */
    public function setCreatedBy(array $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getEpisodeRunTime(): array
    {
        return $this->episodeRunTime;
    }

    /**
     * @param int[] $episodeRunTime
     */
    public function setEpisodeRunTime(array $episodeRunTime): self
    {
        $this->episodeRunTime = $episodeRunTime;

        return $this;
    }

    /**
     * @return TvTvIdGetResponse200GenresItem[]
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param TvTvIdGetResponse200GenresItem[] $genres
     */
    public function setGenres(array $genres): self
    {
        $this->genres = $genres;

        return $this;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): self
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getInProduction(): bool
    {
        return $this->inProduction;
    }

    public function setInProduction(bool $inProduction): self
    {
        $this->inProduction = $inProduction;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    /**
     * @param string[] $languages
     */
    public function setLanguages(array $languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    public function getLastAirDate(): ?\DateTime
    {
        return $this->lastAirDate;
    }

    public function setLastAirDate(?\DateTime $lastAirDate): self
    {
        $this->lastAirDate = $lastAirDate;

        return $this;
    }

    public function getLastEpisodeToAir(): TvTvIdGetResponse200LastEpisodeToAir
    {
        return $this->lastEpisodeToAir;
    }

    public function setLastEpisodeToAir(TvTvIdGetResponse200LastEpisodeToAir $lastEpisodeToAir): self
    {
        $this->lastEpisodeToAir = $lastEpisodeToAir;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return TvTvIdGetResponse200NetworksItem[]
     */
    public function getNetworks(): array
    {
        return $this->networks;
    }

    /**
     * @param TvTvIdGetResponse200NetworksItem[] $networks
     */
    public function setNetworks(array $networks): self
    {
        $this->networks = $networks;

        return $this;
    }

    public function getNumberOfEpisodes(): int
    {
        return $this->numberOfEpisodes;
    }

    public function setNumberOfEpisodes(int $numberOfEpisodes): self
    {
        $this->numberOfEpisodes = $numberOfEpisodes;

        return $this;
    }

    public function getNumberOfSeasons(): int
    {
        return $this->numberOfSeasons;
    }

    public function setNumberOfSeasons(int $numberOfSeasons): self
    {
        $this->numberOfSeasons = $numberOfSeasons;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getOriginCountry(): array
    {
        return $this->originCountry;
    }

    /**
     * @param string[] $originCountry
     */
    public function setOriginCountry(array $originCountry): self
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    public function setOriginalLanguage(string $originalLanguage): self
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPopularity(): float
    {
        return $this->popularity;
    }

    public function setPopularity(float $popularity): self
    {
        $this->popularity = $popularity;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    public function setPosterPath(?string $posterPath): self
    {
        $this->posterPath = $posterPath;

        return $this;
    }

    /**
     * @return TvTvIdGetResponse200ProductionCompaniesItem[]
     */
    public function getProductionCompanies(): array
    {
        return $this->productionCompanies;
    }

    /**
     * @param TvTvIdGetResponse200ProductionCompaniesItem[] $productionCompanies
     */
    public function setProductionCompanies(array $productionCompanies): self
    {
        $this->productionCompanies = $productionCompanies;

        return $this;
    }

    /**
     * @return TvTvIdGetResponse200SeasonsItem[]
     */
    public function getSeasons(): array
    {
        return $this->seasons;
    }

    /**
     * @param TvTvIdGetResponse200SeasonsItem[] $seasons
     */
    public function setSeasons(array $seasons): self
    {
        $this->seasons = $seasons;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVoteAverage(): float
    {
        return $this->voteAverage;
    }

    public function setVoteAverage(float $voteAverage): self
    {
        $this->voteAverage = $voteAverage;

        return $this;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function setVoteCount(int $voteCount): self
    {
        $this->voteCount = $voteCount;

        return $this;
    }
}
