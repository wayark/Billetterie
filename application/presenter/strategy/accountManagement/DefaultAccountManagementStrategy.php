<?php

require_once PATH_PRESENTER . 'strategy/accountManagement/AccountManagementState.php';

class DefaultAccountManagementStrategy implements AccountManagerStrategy
{

    public function handle(User $user, array $post, array $files): ?array
    {
        return null;
    }
}