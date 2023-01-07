<?php

class DefaultAccountManagementState implements AccountManagementState
{

    public function handle(User $user, array $post, array $files): ?array
    {
        return null;
    }
}