<?php

namespace TMDB\API\Model;

class MovieMovieIdGetResponse200ProductionCompaniesItem
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