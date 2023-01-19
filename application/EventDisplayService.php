<?php

class EventDisplayService
{
    public static function generateHTMLEvent(Event $event): string
    {
        $picture = $event->getEventInfo()->getPicture();
        $place = $event->getEventPlace();
        $ans = "";
        $ans .= '<div class="events">';
        $ans .= '<div class="eventimg"><a href="?page=event&event=' . $event->getIdEvent() . '"><img src="' . $picture->getPicturePath() .
            '." alt="' . $picture->getPictureDescription() . '"></a></div>';
        $ans .= '<div class="eventtext-container">';
        $ans .= '<div id="containertextleft"><p class="eventtitle eventtext">' . $event->getEventInfo()->getEventName() . '</p>';
        $ans .= '<p class="eventdate eventtext">' . DateDisplayService::formatDatetime($event->getEventInfo()->getEventDate()) . '</p>';
        $ans .= '<p class="eventdesc eventtext">' . StringService::cutAtFirstParagraph($event->getEventInfo()->getEventDescription()) . '</p></div>';
        $ans .= '<div id="containertextright"><p class="eventplace eventtext">' . $place->getCountry() . '</p>';
        $ans .= '<p class="eventcity eventext">' . $place->getCity() . '</p>';
        $ans .= '<p class="eventplacesremaining eventtext">' . NumberOfTicketsService::getTotalNumberOfRemainingTickets($event) . ' places restantes</p></div>';
        $ans .= "</div></div>";
        return $ans;
    }
}