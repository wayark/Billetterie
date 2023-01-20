<?php

class Artist
{
    private int $idArtist;
    private string $firstName;
    private string $lastName;
    private string $stageName;
    private string $biography;

    /**
     * @param int $idArtist
     * @param string $firstName
     * @param string $lastName
     * @param string $stageName
     * @param string $biography
     */
    public function __construct(int $idArtist, string $firstName, string $lastName, string $stageName, string $biography)
    {
        $this->idArtist = $idArtist;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->stageName = $stageName;
        $this->biography = $biography;
    }


    /**
     * @return int
     */
    public function getIdArtist(): int
    {
        return $this->idArtist;
    }

    /**
     * @param int $idArtist
     */
    public function setIdArtist(int $idArtist): void
    {
        $this->idArtist = $idArtist;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getStageName(): string
    {
        return $this->stageName;
    }

    /**
     * @param string $stageName
     */
    public function setStageName(string $stageName): void
    {
        $this->stageName = $stageName;
    }

    /**
     * @return string
     */
    public function getBiography(): string
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     */
    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }

    public function __toString() : string
    {
        return "Artist: " . $this->getFirstName() . " " . $this->getLastName() . " " . $this->getStageName() . " " . $this->getBiography();
    }

}