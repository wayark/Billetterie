<?php

class SortAndFilterStrategy implements SearchStrategy
{
    private array $get;

    public function __construct(array $get) {
        $this->get = $get;
    }

    public function handleEventList(array $eventList): array
    {
        $name = "";
        $this->filter($eventList, function($event) {return strpos($event->getEventInfo()->getEventName(), $name) !== false;});
    }

    private function filter(array $eventList, $boolCriteriaFunction)
    {
        $ans = array();

        foreach ($eventList as $event) {
            if ($boolCriteriaFunction($event)) {
                $ans[] = $event;
            }
        }

        return $ans;
    }

    /**
     * @param array<Event> $eventList
     * @param string $name
     * @return array List which only contains event with the given name
     */
    private function filterByName(array $eventList, string $name): array
    {
        $ans = array();

        foreach ($eventList as $event) {
            if (strpos($event->getEventInfo()->getEventName(), $name) !== false) {
                $ans[] = $event;
            }
        }

        return $ans;
    }

    /**
     * @param array<Event> $eventList
     * @param string $city
     * @return array
     */
    private function filterByCity(array $eventList, string $city)
    {
        $ans = array();

        foreach ($eventList as $event) {
            if (strpos($event->getEventPlace()->getCity(), $city) !== false) {
                $ans[] = $event;
            }
        }

        return $ans;
    }

    /**
     * @param array<Event> $eventList
     * @param string $start String with timestamp format
     * @param string $end String with timestamp format
     * @return array
     */
    private function filterByDate(array $eventList, string $start, string $end)
    {
        $ans = array();

        foreach ($eventList as $event) {
            if ($event->getEventInfo()->getEventDate() >= $start && $event->getEventInfo()->getEventDate() <= $end) {
                $ans[] = $event;
            }
        }

        return $ans;
    }
}