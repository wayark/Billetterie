<?php
/**
 * @param array<Event> $eventsToSort
 * @return array The events sorted by remaining places
 */
function sortEventByPlace(array $eventsToSort): array
{
    $sortedEvents = $eventsToSort;
    usort($sortedEvents, function ($a, $b) {
        return strcmp(($b->getEventPlace()->getNbPlacesPit() + $b->getEventPlace()->getNbPlacesStair()),
            ($a->getEventPlace()->getNbPlacesPit() + $a->getEventPlace()->getNbPlacesStair()));
    });
    return $sortedEvents;
}