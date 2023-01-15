<?php

class DefaultReceptionStrategy implements ReceptionStrategy
{


    /**
     * @throws Exception
     */
    public function filterEvents(): array
    {
        $eventDAO = new EventDAO();

        $events = $eventDAO->getAll();

        return $events;
    }
}