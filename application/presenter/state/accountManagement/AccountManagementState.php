<?php

require_once PATH_MODELS . 'User.php';

interface AccountManagerState
{
    public function handle(User $user, array $post, array $files): ?array;
}