<?php
    class compte extends DAO{
        private $_Nomcompte;
        private $_MDP;
        private $_Typecompte;

        private function __construct($nom,$MDP,$type){
            $this->_Nomcompte = $nom;
            $this->_MDP = $MDP;
            $this->_Typecompte = $type;
        }

        public getNomcompte(){
            return $this-> $_Nomcompte;
        }

        public getMDP(){
            return $this-> $_MDP;
        }

        public getNomcompte(){
            return $this-> $_Typecompte;
        }

        public setNomcompte($nom){
            $this->_Nomcompte = $nom;
        }

        public setMDP($MDP){
            $this->_MDP = $MDP;
        }

        public setNomcompte($type){
            $this->_Typecompte = $type;        
        }
    }
    ?>