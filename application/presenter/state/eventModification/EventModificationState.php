<?php

interface EventModificationState
{
    public function handle(array $get, array $post): array;
}