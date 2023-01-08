<?php

require_once PATH_MODELS . 'User.php';

interface AccountManagerStrategy
{
    public function handle(User $user, array $post, array $files): ?array;
}