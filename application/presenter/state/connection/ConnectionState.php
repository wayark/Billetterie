<?php

interface ConnectionState
{
    public function handle(array $post): array;
}