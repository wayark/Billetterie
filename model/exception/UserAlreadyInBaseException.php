<?php

class UserAlreadyInBaseException extends Exception
{
    public function __construct()
    {
        parent::__construct("L'utilisateur est déjà dans la base de données.");
    }
}