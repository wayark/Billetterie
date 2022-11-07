<?php
    class utilisateur extends DAO{
        private $_Nom;
        private $_Prenom;
        private $_Mail;
        private $_DateNaissance;
        private $_Adresse;

        private function __construct($nom,$MDP,$mail,$date,$adr){
            $this->_Nom = $nom;
            $this->_Prenom = $prenom;
            $this->_Mail = $mail;
            $this->_DateNaissance = $date;
            $this->_Adresse = $adr;
        }

        public getNom(){
            return $this-> $_Nom;
        }

        public getPrenom(){
            return $this-> $_Prenom;
        }

        public getMail(){
            return $this-> $_Mail;
        }

        public getDatenaissance(){
            return $this-> $_DateNaissance;
        }

        public getAdresse(){
            return $this-> $_Adresse;
        }

        public setNom($nom){
            $this->_Nom = $nom;
        }

        public setPrenom($prenom){
            $this->_Prenom = $prenom;
        }

        public setMail($mail){
            $this->_Mail = $mail;
        }

        public setDateNaissance($date){
            $this->_DateNaissance = $date;      
        }

        public setAdresse(){
            $this->_Adresse = $adr;
        }
    }
    ?>