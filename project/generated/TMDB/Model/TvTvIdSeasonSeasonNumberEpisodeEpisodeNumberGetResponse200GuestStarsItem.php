<?php

namespace TMDB\API\Model;

class TvTvIdSeasonSeasonNumberEpisodeEpisodeNumberGetResponse200GuestStarsItem
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
    protected $name;
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
    protected $character;
    /**
     * 
     *
     * @var int
     */
    protected $order;
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
    public function getCharacter() : string
    {
        return $this->character;
    }
    /**
     * 
     *
     * @param string $character
     *
     * @return self
     */
    public function setCharacter(string $character) : self
    {
        $this->character = $character;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getOrder() : int
    {
        return $this->order;
    }
    /**
     * 
     *
     * @param int $order
     *
     * @return self
     */
    public function setOrder(int $order) : self
    {
        $this->order = $order;
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