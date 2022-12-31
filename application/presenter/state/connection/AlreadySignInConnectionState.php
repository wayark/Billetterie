<?php

require_once PATH_PRESENTER . 'state/connection/ConnectionState.php';

class AlreadySignInConnectionState implements ConnectionState
{

    public function handle(array $post): array
    {
        return array(
            'type' => 'success',
        );
    }
}