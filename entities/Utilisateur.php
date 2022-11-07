<?php
    class User {
        private $_lastName;
        private $_firstName;
        private $_mail;
        private $_birthDate;
        private $_address;
        private $_password;

        private function __construct($nom, $prenom, $MDP,$mail,$date,$adr){
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
    }
    ?>