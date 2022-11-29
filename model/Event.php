<?php

class Event
{
    private $_IdEvent;
    private $_Name;
    private $_Country;
    private $_City;
    private $_Hall;
    private $_Date;
    private $_idTypeEvent;
    private $_NbPlaces;
    private $_idOrganisater;
    private $_idArtiste;
    private $_idPhotos;


    public function __construct($id = -1, $name = "", $country = "", $city = "", $hall = "", $date = ""
        ,                       $type = "", $nbplace = "", $organizer = "", $artiste = "", $photo = "")
    {
        $this->_IdEvent = $id;
        $this->_Name = $name;
        $this->_Country = $country;
        $this->_City = $city;
        $this->_Hall = $hall;
        $this->_Date = $date;
        $this->_idTypeEvent = $type;
        $this->_NbPlaces = $nbplace;
        $this->_idOrganizer = $organizer;
        $this->_idArtiste = $artiste;
        $this->_idPhotos = $photo;
    }


    /*Getters Event*/


    public function getIdEvent()
    {
        return $this->$_IdEvent;
    }

    public function getName()
    {
        return $this->$_Name;
    }

    public function getCountry()
    {
        return $this->$_Country;
    }

    public function getCity()
    {
        return $this->$_City;
    }

    public function getHall()
    {
        return $this->$_Hall;
    }

    public function getDate()
    {
        return $this->$_Date;
    }

    public function getTypeEvent()
    {
        return $this->$_idTypeEvent;
    }

    public function getNbplace()
    {
        return $this->$_NbPlaces;
    }

    public function getOrganizer()
    {
        return $this->$_idOrganisater;
    }

    public function getArtiste()
    {
        return $this->$_idArtiste;
    }

    public function getPhoto()
    {
        return $this->$_idPhotos;
    }


    /*Setters Event*/


    public function setIdEvent($id)
    {
        $this->_IdEvent = $id;
    }

    public function setName($name)
    {
        $this->_Name = $name;
    }

    public function setCountry($country)
    {
        $this->_Country = $country;
    }

    public function setCity($city)
    {
        $this->_City = $city;
    }

    public function setHall($hall)
    {
        $this->_Hall = $hall;
    }

    public function setDate($date)
    {
        $this->_Date = $date;
    }

    public function setTypeEvent($type)
    {
        $this->_idTypeEvent = $type;
    }

    public function setNbplace($nbplace)
    {
        $this->_NbPlaces = $nbplace;
    }

    public function setOrganizer($organizer)
    {
        $this->_idOrganizer = $organizer;
    }

    public function setArtiste($artiste)
    {
        $this->_idArtiste = $artiste;
    }

    public function setPhoto($photo)
    {
        $this->_idPhotos = $photo;
    }
}