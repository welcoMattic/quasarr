<?php

namespace TMDB\API\Model;

class TvTvIdGetResponse200NetworksItem
{
    /**
     * 
     *
     * @var string
     */
    protected $name;
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
    protected $logoPath;
    /**
     * 
     *
     * @var string
     */
    protected $originCountry;
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
    public function getLogoPath() : string
    {
        return $this->logoPath;
    }
    /**
     * 
     *
     * @param string $logoPath
     *
     * @return self
     */
    public function setLogoPath(string $logoPath) : self
    {
        $this->logoPath = $logoPath;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getOriginCountry() : string
    {
        return $this->originCountry;
    }
    /**
     * 
     *
     * @param string $originCountry
     *
     * @return self
     */
    public function setOriginCountry(string $originCountry) : self
    {
        $this->originCountry = $originCountry;
        return $this;
    }
}