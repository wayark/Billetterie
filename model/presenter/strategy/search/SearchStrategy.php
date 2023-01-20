<?php

interface SearchStrategy
{
    public function handleEventList(array $eventList) : array;
}