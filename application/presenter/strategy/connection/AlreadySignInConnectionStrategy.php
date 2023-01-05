<?php

require_once PATH_PRESENTER . 'strategy/connection/ConnectionStrategy.php';

class AlreadySignInConnectionStrategy implements ConnectionStrategy
{

    public function handle(array $post): array
    {
        return array(
            'type' => 'success',
        );
    }
}