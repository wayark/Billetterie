<?php

interface EventModificationStrategy
{
    public function handle(array $get, array $post): array;
}