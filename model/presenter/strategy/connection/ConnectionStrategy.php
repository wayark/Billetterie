<?php

interface ConnectionStrategy
{
    public function handle(array $post): array;
}