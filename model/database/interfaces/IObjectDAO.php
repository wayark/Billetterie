<?php
interface IObjectDAO
{
    function getById(int $id);

    function getAll();

    function getLastId(): int;
}