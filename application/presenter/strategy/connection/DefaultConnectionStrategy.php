<?php

require_once PATH_PRESENTER . 'strategy/connection/ConnectionState.php';

class DefaultConnectionStrategy implements ConnectionStrategy
{

    public function handle(?array $post): array
    {
        return array('type' => 'error');
    }
}