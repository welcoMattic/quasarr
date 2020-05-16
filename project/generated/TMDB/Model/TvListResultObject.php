<?php

namespace TMDB\API\Model;

class TvListResultObject
{
    /**
     * @var string|null
     */
    protected $posterPath;
    /**
     * @var float
     */
    protected $popularity;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $backdropPath;
    /**
     * @var float
     */
    protected $voteAverage;
    /**
     * @var string
     */
    protected $overview;
    /**
     * @var string[]
     */
    protected $originCountry;
    /**
     * @var int[]
     */
    protected $genreIds;
    /**
     * @var string
     */
    protected $originalLanguage;
    /**
     * @var int
     */
    protected $voteCount;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $originalName;

    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    public function setPosterPath(?string $posterPath): self
    {
        $this->posterPath = $posterPath;

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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdropPath;
    }

    public function setBackdropPath(?string $backdropPath): self
    {
        $this->backdropPath = $backdropPath;

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

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): self
    {
        $this->overview = $overview;

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

    /**
     * @return int[]
     */
    public function getGenreIds(): array
    {
        return $this->genreIds;
    }

    /**
     * @param int[] $genreIds
     */
    public function setGenreIds(array $genreIds): self
    {
        $this->genreIds = $genreIds;

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

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function setVoteCount(int $voteCount): self
    {
        $this->voteCount = $voteCount;

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

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }
}
