<?php

class DefaultSearchStrategy implements SearchStrategy
{

    public function handleEventList(array $eventList): array
    {
        $display['events'] = "";
        foreach ($eventList as $evt) {
            $display['events'] .= EventDisplayService::generateHTMLEvent($evt);
        }
        return $display;
    }

}