<?php

class AlreadySignInConnectionStrategy implements ConnectionStrategy
{

    public function handle(array $post): array
    {
        return array(
            'type' => 'success',
        );
    }
}