<?php

class AlreadySignInConnectionState implements ConnectionState
{

    public function handle(array $post): array
    {
        return array(
            'type' => 'success',
        );
    }
}