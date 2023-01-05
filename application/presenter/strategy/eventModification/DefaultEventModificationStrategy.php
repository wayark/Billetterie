<?php

require_once PATH_PRESENTER . 'strategy/eventModification/EventModificationStrategy.php';

class DefaultEventModificationStrategy implements EventModificationStrategy
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