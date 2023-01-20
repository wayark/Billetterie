<?php

class UserAlreadyInBaseException extends Exception
{
    public function __construct($message = "L'utilisateur est déjà dans la base de données.")
    {
        parent::__construct($message);
    }
}