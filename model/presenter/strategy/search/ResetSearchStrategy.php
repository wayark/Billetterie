<?php

class ResetSearchStrategy implements SearchStrategy
{

    /**
     * @throws Exception
     */
    public function handleEventList(array $eventList): array
    {
        $_SESSION['lastSearch'] = null;
        $eventDAO = new EventDAO();

        return $eventDAO->getAll();
    }
}