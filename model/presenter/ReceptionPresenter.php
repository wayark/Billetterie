<?php

class ReceptionPresenter extends Presenter
{
    /**
     * @var array<Event>
     */
    private array $events;
    private ?array $error = null;
    private array $remainingTickets;

    /**
     * @inheritDoc
     */
    public function __construct(array $get = null, array $post = null)
    {
        parent::__construct($get, $post);
    }

    protected function checkProcess(): void
    {
        try {
            $eventDAO = new EventDAO();

            $this->events = $eventDAO->getAll();
            $this->remainingTickets = array();
            foreach ($this->events as $event) {
                $this->remainingTickets[$event->getIdEvent()] = NumberOfTicketsService::getTotalNumberOfRemainingTickets($event);
            }

        } catch (Error $e) {
            $this->error = array(
                "message" => "Une erreur est survenue lors de la récupération des événements",
                "type" => "error",
                "trace" => $e->getTraceAsString(),
                "events" => ""
            );
        } catch (Exception $e) {
            $this->error = array(
                "message" => "Une erreur est survenue lors de la récupération des événements",
                "type" => "error",
                "trace" => $e->getTraceAsString(),
                "events" => ""
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        print_r($this->error);
        if (!is_null($this->error)) return $this->error;

        $display = array();
        $displayString = "";
        for ($i = 0; $i < count($this->events) && $i <= 5; $i++) {
            $event = $this->events[$i];
            $displayString .= '<div class=events>';
            $displayString .= '<div class=eventimg>';
            $displayString .= '<a href="?page=event&event=' . $event->getIdEvent() . '">';
            $displayString .= '<img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" alt="' . $event->getEventInfo()->getPicture()->getPictureDescription() . '">';
            $displayString .= '</a>';
            $displayString .= '</div>';
            $displayString .= '<div class="eventtext-container">';
            $displayString .= '<div id="containertextleft">';
            $displayString .= '<p class="eventtitle eventtext">' . $event->getEventInfo()->getEventName() . '</p>';
            $displayString .= '<p class="eventdate eventtext">' . DateDisplayService::formatDatetime($event->getEventInfo()->getEventDate()) . '</p>';
            $displayString .= '<p class="eventdesc eventtext">' . $event->getEventInfo()->getEventDescription() . '</p>';
            $displayString .= "</div>";
            $displayString .= '<div id="containertextright">';
            $displayString .= '<p class="eventplace eventtext">' . $event->getEventPlace()->getCountry() . '</p>';
            $displayString .= '<p class="eventcity eventext">' . $event->getEventPlace()->getCity() . '</p>';
            $displayString .= '<p class="eventplacesremaining eventtext">' . strval($this->remainingTickets[$event->getIdEvent()]) . ' places restantes' . '</p>';
            $displayString .= "</div>";
            $displayString .= "</div></div>";
        }
        $display['events'] = $displayString;
        return $display;
    }
}