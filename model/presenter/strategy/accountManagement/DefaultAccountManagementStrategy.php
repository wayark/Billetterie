<?php

class DefaultAccountManagementStrategy implements AccountManagementStrategy
{

    public function handle(User $user, array $post, array $files): ?array
    {
        return null;
    }
}