<?php

interface AccountManagementStrategy
{
    public function handle(User $user, array $post, array $files): ?array;
}