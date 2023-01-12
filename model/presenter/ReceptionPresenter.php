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
            $displayString .= EventDisplayService::generateHTMLEvent($event);
         }
        $display['events'] = $displayString;
        return $display;
    }
}