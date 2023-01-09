<?php

class EventAlreadyInBaseException extends Exception
{
    public function __construct($message = "L'évènement est déjà dans la base de données.")
    {
        parent::__construct($message);
    }
}