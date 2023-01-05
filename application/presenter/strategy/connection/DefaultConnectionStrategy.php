<?php

require_once PATH_PRESENTER . 'strategy/connection/ConnectionStrategy.php';

class DefaultConnectionStrategy implements ConnectionStrategy
{

    public function handle(?array $post): array
    {
        return array('type' => 'error');
    }
}