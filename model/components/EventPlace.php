<?php

class EventPlace
{
    private string $country;
    private string $city;
    private string $street;
    private string $placeName;

    private int $nbPlacesPit;
    private int $nbPlacesStair;

    public function __construct(string $country = "",
                                string $city = "",
                                string $hall = "",
                                string $street = "",
                                int $nbPlacesPit = -1,
                                int $nbPlacesStair = -1)
    {
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->nbPlacesPit = $nbPlacesPit;
        $this->nbPlacesStair = $nbPlacesStair;
        $this->placeName = $hall;
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
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
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

    /**
     * @return string
     */
    public function getPlaceName(): string
    {
        return $this->placeName;
    }

    /**
     * @param string $placeName
     */
    public function setPlaceName(string $placeName): void
    {
        $this->placeName = $placeName;
    }
}