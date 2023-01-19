<?php

class DefaultCreateEventStrategy implements CreateEventStrategy
{

    public function handle(array $post, array $files): array
    {
        return array();
    }
}