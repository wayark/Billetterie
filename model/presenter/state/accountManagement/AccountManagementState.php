<?php

interface AccountManagementState
{
    public function handle(User $user, array $post, array $files): ?array;
}