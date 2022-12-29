<?php

require_once PATH_PRESENTER . 'state/accountManagement/AccountManagementState.php';

class DefaultAccountManagementState implements AccountManagerState
{

    public function handle(User $user, array $post, array $files): ?array
    {
        return null;
    }
}