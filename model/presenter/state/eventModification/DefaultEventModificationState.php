<?php

class DefaultEventModificationState implements EventModificationState
{

    public function handle(array $get, array $post): array
    {
        return array(
            "message" => "L'événement n'existe pas",
            "type" => "error",
            "event" => null
        );
    }
}