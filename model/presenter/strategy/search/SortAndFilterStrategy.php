<?php

class SortAndFilterStrategy implements SearchStrategy
{
    private array $get;

    public function __construct(array $get) {
        $this->get = $get;
    }

    /**
     * @param array<Event> $eventList
     * @return array
     */
    public function handleEventList(array $eventList): array
    {
        $sort = $this->get['sort'];

        $eventList = $this->filterArray($eventList);

        // Sort
        if ($sort === 'date') {
            usort($eventList, function ($a, $b) {
                return $a->getEventInfo()->getEventDate() <=> $b->getEventInfo()->getEventDate();
            });
        } else if ($sort === 'name') {
            usort($eventList, function ($a, $b) {
                return $a->getEventInfo()->getEventName() <=> $b->getEventInfo()->getEventName();
            });
        } else if ($sort === 'remaining') {
            usort($eventList, function ($a, $b) {
                return NumberOfTicketsService::getTotalNumberOfRemainingTickets($a)
                    <=> NumberOfTicketsService::getTotalNumberOfRemainingTickets($b);
            });
        }


        return $eventList;
    }

    private function filter(array $eventList, $boolCriteriaFunction): array
    {
        $ans = array();

        foreach ($eventList as $event) {
            if ($boolCriteriaFunction($event)) {
                $ans[] = $event;
            }
        }

        return $ans;

    }

    private function filterArray(array $eventList) : array
    {

        $name = $this->get['text-field'];
        $artist = $this->get['artist-field'];
        $city = $this->get['city'];
        $startDate = $this->get['start-date'];
        $endDate = $this->get['end-date'];
        $available = $this->get['available'];

        // Filter by name
        if (!empty($name)) {
            $eventList = $this->filter($eventList, function($event) use ($name)
            {
                if ($name === '') {
                    return false;
                }
                $eventName = strtoupper($event->getEventInfo()->getEventName());
                $name = strtoupper($name);
                return strpos($eventName, $name) !== false;
            });
        }

        // Filter by artist
        if (!empty($artist)) {
            $eventList = $this->filter($eventList, function($event) use ($artist)
            {
                if ($artist === '') {
                    return false;
                }
                $stageName = strtoupper($event->getArtist()->getStageName());
                $firstName = strtoupper($event->getArtist()->getFirstName());
                $lastName = strtoupper($event->getArtist()->getLastName());
                $artist = strtoupper($artist);
                return strpos($stageName, $artist) !== false
                    || strpos($firstName, $artist) !== false
                    || strpos($lastName, $artist) !== false;
            });
        }

        // Filter by city
        if (!empty($city)) {
            $eventList = $this->filter($eventList, function($event) use ($city)
            {
                if ($city === '') {
                    return false;
                }
                $city = strtoupper($city);
                $eventCity = strtoupper($event->getEventPlace()->getCity());
                return strpos($eventCity, $city) !== false;
            });
        }

        // Filter by date
        if (!empty($startDate) && !empty($endDate)) {
            $eventList = $this->filter($eventList, function($event) use ($startDate, $endDate)
            {
                if ($startDate === '' || $endDate === '') {
                    return false;
                }
                $eventDate = $event->getEventInfo()->getEventDate();
                return $eventDate >= $startDate && $eventDate <= $endDate;
            });
        }

        // Filter by available
        if ($available !== "none") {
            $eventList = $this->filter($eventList, function($event) use ($available)
            {
                if ($available === 'available') {
                    return NumberOfTicketsService::getTotalNumberOfRemainingTickets($event) > 0;
                } else if ($available === 'not-available') {
                    return NumberOfTicketsService::getTotalNumberOfRemainingTickets($event) <= 0;
                }
                return false;
            });
        }

        return $eventList;
    }

}