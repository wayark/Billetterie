<?php

class EventPlace
{
    private string $country;
    private string $city;
    private string $hall;
    private int $nbPlacesPit;
    private int $nbPlacesStair;

    public function __construct(string $country = "",
                                string $city = "", string $hall = "",
                                int $nbPlacesPit = -1,
                                int $nbPlacesStair = -1)
    {
        $this->country = $country;
        $this->city = $city;
        $this->hall = $hall;
        $this->nbPlacesPit = $nbPlacesPit;
        $this->nbPlacesStair = $nbPlacesStair;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getHall(): string
    {
        return $this->hall;
    }

    /**
     * @param string $hall
     */
    public function setHall(string $hall): void
    {
        $this->hall = $hall;
    }

    /**
     * @return int
     */
    public function getNbPlacesPit(): int
    {
        return $this->nbPlacesPit;
    }

    /**
     * @param int $nbPlacesPit
     */
    public function setNbPlacesPit(int $nbPlacesPit): void
    {
        $this->nbPlacesPit = $nbPlacesPit;
    }

    /**
     * @return int
     */
    public function getNbPlacesStair(): int
    {
        return $this->nbPlacesStair;
    }

    /**
     * @param int $nbPlacesStair
     */
    public function setNbPlacesStair(int $nbPlacesStair): void
    {
        $this->nbPlacesStair = $nbPlacesStair;
    }
}