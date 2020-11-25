<?php

namespace TMDB\API\Model;

class MovieMovieIdGetResponse200ProductionCountriesItem
{
    /**
     * 
     *
     * @var string
     */
    protected $iso31661;
    /**
     * 
     *
     * @var string
     */
    protected $name;
    /**
     * 
     *
     * @return string
     */
    public function getIso31661() : string
    {
        return $this->iso31661;
    }
    /**
     * 
     *
     * @param string $iso31661
     *
     * @return self
     */
    public function setIso31661(string $iso31661) : self
    {
        $this->iso31661 = $iso31661;
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
}