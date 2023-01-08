<?php

interface IObjectDTO
{
    function add($object): void;

    function update($object): void;

    function delete($object): void;
}