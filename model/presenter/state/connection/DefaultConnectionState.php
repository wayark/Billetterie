<?php

class DefaultConnectionState implements ConnectionState
{

    public function handle(?array $post): array
    {
        return array('type' => 'error');
    }
}