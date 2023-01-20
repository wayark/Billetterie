<?php

class DefaultConnectionStrategy implements ConnectionStrategy
{

    public function handle(?array $post): array
    {
        return array('type' => 'error');
    }
}