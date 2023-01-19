<?php

class ReceptionPresenter extends Presenter
{
    /**
     * @var array<Event>
     */
    private array $events;
    private ReceptionStrategy $strategy;

    /**
     * @inheritDoc
     */
    public function __construct(array $get = null, array $post = null)
    {
        parent::__construct($get, $post);
    }

    /**
     * @throws Exception
     */
    protected function checkProcess(): void
    {
        if (isset($this->get['submit'])) {
            $this->strategy = new SearchReceptionStrategy($this->get);
        } else {
            $this->strategy = new DefaultReceptionStrategy();
        }

        $this->events = $this->strategy->filterEvents();
    }

    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
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