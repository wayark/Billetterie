<?php

class PersonInfo
{
    /**
     * @var string $_firstName First name of the user
     */
    private string $_firstName;
    /**
     * @var string $_mail The mail of the user
     */
    private string $_mail;
    /**
     * @var string $_birthDate Date with format YYYY-MM-DD
     */
    private string $_birthDate;
    /**
     * @var string $_address :
     */
    private string $_address;
    private Picture $_picture;

    public function __construct(string $firstName, string $lastName, string $mail, string $birthDate, string $address, Picture $picture)
    {
        $this->_lastName = $lastName;
        $this->_firstName = $firstName;
        $this->_mail = $mail;
        $this->_birthDate = $birthDate;
        $this->_address = $address;
        $this->_picture = $picture;
    }

    /**
     * @var string $_lastName Last name of the user
     */
    private string $_lastName;

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->_lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->_lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->_firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->_firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->_mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->_mail = $mail;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->_birthDate;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate(string $birthDate): void
    {
        $this->_birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->_address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->_address = $address;
    }

    /**
     * @return Picture
     */
    public function getPicture(): Picture
    {
        return $this->_picture;
    }

    /**
     * @param Picture $picture
     */
    public function setPicture(Picture $picture): void
    {
        $this->_picture = $picture;
    }

}