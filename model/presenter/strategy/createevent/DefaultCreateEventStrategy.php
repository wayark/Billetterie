<?php

class DefaultCreateEventStrategy implements CreateEventStrategy
{

    public function handle(array $post): array
    {
        return array();
    }
}