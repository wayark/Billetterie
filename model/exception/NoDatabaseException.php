<?php

class NoDatabaseException extends Exception
{
    public function __construct()
    {
        parent::__construct("No database connection");
    }
}