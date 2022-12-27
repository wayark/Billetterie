<?php

interface IObjectDAO
{
    function getById(int $id);
    function getAll() : array;
}