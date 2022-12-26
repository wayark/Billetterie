<?php

<<<<<<< HEAD
require_once PATH_MODELS . 'Event.php';

class EventDTO
=======
require_once PATH_MODELS . 'DTO.php';
require_once PATH_MODELS . 'Event.php';

class EventDTO extends DTO
>>>>>>> Dev
{
    public function addEvent(Event $event) {

    }

    public function removeEvent(Event $event) {

    }

    public function updateEvent(Event $event) {

    }
}