<?php

require_once './model/database/dao/EventDAO.php';

$eventDAO = new EventDAO();
try {
    $allEvents = $eventDAO->getAll();
} catch (Exception $e) {
}

/**
 * @param array<Event> $events The events to display
 * @return string The HTML code to display the events
 */
function eventDisplayString(array $events): string
{
    $displayString = "";
    for ($i = 0; $i < count($events) && $i <= 5; $i++) {
        $event = $events[$i];
        $displayString .= '<div class=events>';
        $displayString .= '<div class=eventimg>';
        $displayString .= '<a href="index.php?page=event&&event=' . $event->getIdEvent() . '">';
        $displayString .= '<img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" alt="' . $event->getEventInfo()->getPicture()->getPictureDescription() . '">';
        $displayString .= '</a>';
        $displayString .= '</div>';
        $displayString .= '<div class="eventtext-container">';
        $displayString .= '<div id="containertextleft">';
        $displayString .= '<p class="eventtitle eventtext">' . $event->getEventInfo()->getEventName() . '</p>';
        $displayString .= '<p class="eventdate eventtext">' . format_date($event->getEventInfo()->getEventDate()) . '</p>';
        $displayString .= '<p class="eventdesc eventtext">' . $event->getEventInfo()->getEventDescription() . '</p>';
        $displayString .= "</div>";
        $displayString .= '<div id="containertextright">';
        $displayString .= '<p class="eventplace eventtext">' . $event->getEventPlace()->getCountry() . '</p>';
        $displayString .= '<p class="eventcity eventext">' . $event->getEventPlace()->getCity() . '</p>';
        $displayString .= '<p class="eventplacesremaining eventtext">' . strval($event->getEventPlace()->getNbPlacesPit() + $event->getEventPlace()->getNbPlacesStair()) . ' places restantes' . '</p>';
        $displayString .= "</div>";
        $displayString .= "</div></div>";

    }
    return $displayString;
}


require_once (PATH_VIEWS . 'reception.php');