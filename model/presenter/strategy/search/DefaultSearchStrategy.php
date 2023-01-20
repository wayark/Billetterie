<?php

class DefaultSearchStrategy implements SearchStrategy
{

    public function handleEventList(array $eventList): array
    {
        return $eventList;
    }

}