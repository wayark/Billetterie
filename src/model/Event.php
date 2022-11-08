<?php
    class event extends DAO{
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


        private function __construct($id,$nom,$pays,$ville,$salle,$date,$type,$nbplace,$organisateur,$artiste,$photo){
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


        public getIdEvent(){
            return $this-> $_IdEvent;
        }

        public getName(){
            return $this-> $_Name;
        }

        public getCountry(){
            return $this-> $_Country;
        }

        public getCity(){
            return $this-> $_City;
        }

        public getHall(){
            return $this-> $_Hall;
        }
        
        public getDate(){
            return $this-> $_Date;
        }
        
        public getTypeEvent(){
            return $this-> $_idTypeEvent;
        }
        
        public getNbplace(){
            return $this-> $_NbPlaces;
        }
        
        public getOrganizer(){
            return $this-> $_idOrganisater;
        }
        
        public getArtiste(){
            return $this-> $_idArtiste;
        }

        public getPhoto(){
            return $this-> $_idPhotos;
        }


        /*Setters Event*/


        public setIdEvent(){
            $this->_IdEvent = $id;
        }

        public setName(){
            $this->_Name = $name;
        }

        public setCountry(){
            $this->_Country = $country;
        }

        public setCity(){
            $this->_City = $city;
        }

        public setHall(){
            $this->_Hall = $hall;
        }
        
        public setDate(){
            $this->_Date = $date;
        }
        
        public setTypeEvent(){
            $this->_idTypeEvent = $type;
        }
        
        public setNbplace(){
            $this->_NbPlaces = $nbplace;
        }
        
        public setOrganizer(){
            $this->_idOrganizer = $organizer;
        }
        
        public setArtiste(){
            $this->_idArtiste = $artiste;
        }

        public setPhoto(){
            $this->_idPhotos = $photo;
        }
    }