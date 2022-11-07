<?php
    class User {
        private $_id;
        private $_lastName;
        private $_firstName;
        private $_mail;
        private $_birthDate;
        private $_address;
        private $_password;
        private $_favoriteMethod;

        public function __construct($id, $nom, $prenom, $MDP,$mail,$date,$adr){
            $this->_id = $id;
            $this->_lastName = $nom;
            $this->_firstName = $prenom;
            $this->_password = $MDP;
            $this->_mail = $mail;
            $this->_birthDate = $date;
            $this->_address = $adr;
        }

        public function getLastName(){
            return $this-> $_lastName;
        }

        public function getFirstName(){
            return $this-> $_firstName;
        }

        public function getMail(){
            return $this-> $_mail;
        }

        public function getBirthDate(){
            return $this-> $_birthDate;
        }

        public function getAddress(){
            return $this-> $_address;
        }

        public function getId() {
            return $this->_id;
        }

        public function getPassword() {
            return $this->_password;
        }

        public function setPassword() {
            return $this->_password;
        }

        public function setLastName($nom){
            $this->_lastName = $nom;
        }

        public function setFirstName($prenom){
            $this->_firstName = $prenom;
        }

        public function setMail($mail){
            $this->_mail = $mail;
        }

        public function setBirthDate($date){
            $this->_birthDate = $date;
        }

        public function setAddress($adr){
            $this->_address = $adr;
        }

        public function setFavoriteMethod($method) {
            $this->_favoriteMethod = $method;
        }

        public function getFavoriteMethod() {
            return $this->_favoriteMethod;
        }
    }
    ?>