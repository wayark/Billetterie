<?php
interface CreateEventStrategy
{
    public function handle(array $post, array $files): array;
}