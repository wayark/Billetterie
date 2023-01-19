<?php

class EventListPresenter extends Presenter
{
    /**
     * @var array<Event> $events
     */
    private array $events;
    private User $user;

    public function __construct(array $get, array $post)
    {
        parent::__construct($get, $post);
    }

    /**
     * @inheritDoc
     */
    protected function checkProcess(): void
    {
        $eventDAO = new EventDAO();
        $this->user = $_SESSION['user'];
        try {
            $this->events = $eventDAO->getEventsFrom($this->user->getId());
        } catch (Exception $e) {
            $this->events = [];
        }
    }

    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        return [
            'events' => $this->displayStringEvents(),
        ];
    }

    private function displayStringEvents(): string
    {
        if (empty($this->events)) {
            return '<div class="eventList-exempleEvent" id="eventList-exempleEvent"><p>Vous n\'avez pas encore d\'événement</p></div>';
        }

        $ans = "";
        foreach ($this->events as $event) {
            $ans .= '<div class="eventList-exempleEvent" id="eventList-exempleEvent">';
            $ans .= '<div class="eventImg">';
            $ans .= '<a href="index.php?page=event&event=' . $event->getIdEvent() . '">';
            $ans .= '<img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" alt="' . $event->getEventInfo()->getPicture()->getPictureDescription() . '">';
            $ans .= '</a>';
            $ans .= '</div>';
            $ans .= '<div class="eventTitre">';
            $ans .= '<h1>' . $event->getEventInfo()->getEventName() . '</h1>';
            $ans .= '</div>';
            $ans .= '<div class="eventButton">';
            $ans .= '<a href="./index.php?page=eventModification&event=' . $event->getIdEvent() . '">';
            $ans .= '<button>Modifier</button>';
            $ans .= '</a>';
            $ans .= '<a href="./index.php?page=statEvent&&event=' . $event->getIdEvent() . '">';
            $ans .= '<button>Statistiques</button>';
            $ans .= '</a>';
            $ans .= '</a>';
            $ans .= '<a href="./index.php?page=delete&&event=' . $event->getIdEvent() . '">';
            $ans .= '<button>Supprimer</button>';
            $ans .= '</a>';
            $ans .= '</div>';
            $ans .= '</div>';
        }

        return $ans;
    }
}
