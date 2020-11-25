<?php

namespace TMDB\API\Model;

class TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200CrewItem
{
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
    protected $creditId;
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
    protected $department;
    /**
     * 
     *
     * @var string
     */
    protected $job;
    /**
     * 
     *
     * @var string|null
     */
    protected $profilePath;
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
    public function getCreditId() : string
    {
        return $this->creditId;
    }
    /**
     * 
     *
     * @param string $creditId
     *
     * @return self
     */
    public function setCreditId(string $creditId) : self
    {
        $this->creditId = $creditId;
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
    public function getDepartment() : string
    {
        return $this->department;
    }
    /**
     * 
     *
     * @param string $department
     *
     * @return self
     */
    public function setDepartment(string $department) : self
    {
        $this->department = $department;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getJob() : string
    {
        return $this->job;
    }
    /**
     * 
     *
     * @param string $job
     *
     * @return self
     */
    public function setJob(string $job) : self
    {
        $this->job = $job;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getProfilePath() : ?string
    {
        return $this->profilePath;
    }
    /**
     * 
     *
     * @param string|null $profilePath
     *
     * @return self
     */
    public function setProfilePath(?string $profilePath) : self
    {
        $this->profilePath = $profilePath;
        return $this;
    }
}