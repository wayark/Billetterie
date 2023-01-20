<?php

class SearchReceptionStrategy implements ReceptionStrategy
{
    private array $get;

    public function __construct(array $get)
    {
        $this->get = $get;
    }

    /**
     * @throws Exception
     */
    public function filterEvents(): array
    {
        $eventDAO = new EventDAO();
        $events = $eventDAO->getAll();
        $result = array();
        $search_name = strtoupper($this->get['search']);
        foreach ($events as $event) {
            $event_name = strtoupper($event->getEventInfo()->getEventName());
            if (strpos($event_name, $search_name) !== false) {
                $result[] = $event;
            }
        }

        return $result;
    }
}