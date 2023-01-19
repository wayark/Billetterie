<?php

class ArtistAlreadyInBaseException extends Exception
{
    public function __construct($message = "L'artiste est déjà dans la base de données.")
    {
        parent::__construct($message);
    }
}