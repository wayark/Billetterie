<?php

class SortAndFilterStrategy implements SearchStrategy
{
    private array $get;

    public function __construct(array $get) {
        $this->get = $get;
    }

    public function handleEventList(array $eventList): array
    {

    }
}