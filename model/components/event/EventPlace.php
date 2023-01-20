<?php
class EventPlace
{
    private int $idLocation;
    private string $country;
    private string $city;
    private string $street;
    private string $placeName;

    public function __construct(int    $id = -1,
                                string $country = "",
                                string $city = "",
                                string $hall = "",
                                string $street = "")
    {
        $this->idLocation = $id;
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
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

    /**
     * @return int
     */
    public function getIdLocation(): int
    {
        return $this->idLocation;
    }

    /**
     * @param int $idLocation
     */
    public function setIdLocation(int $idLocation): void
    {
        $this->idLocation = $idLocation;
    }
}