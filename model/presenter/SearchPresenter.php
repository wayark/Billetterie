<?php

class SearchPresenter extends Presenter
{

    private SearchStrategy $strategy;
    private array $eventList;

    public function __construct(?array $get, ?array $post)
    {
        parent::__construct($get, $post);
    }

    /**
     * @throws Exception
     */
    protected function checkProcess(): void
    {
        if (isset($_SESSION['lastSearch'])) {
            $this->eventList = $_SESSION['lastSearch'];
        } else {
            $eventDAO = new EventDAO();
            $this->eventList = $eventDAO->getAll();
        }

        if (isset($this->get['submit-button'])) {
            $this->strategy = new SortAndFilterStrategy($this->get);
        } else if(!empty($this->get['reset'])) {
            $this->strategy = new ResetSearchStrategy();
        } else {
            $this->strategy = new DefaultSearchStrategy();
        }

        $this->eventList = $this->strategy->handleEventList($this->eventList);

        $_SESSION['lastSearch'] = $this->eventList;
    }

    public function formatDisplay(): array
    {
        $display = array('events' => "");

        foreach ($this->eventList as $event) {
            $display['events'] .= EventDisplayService::generateHTMLEvent($event);
        }

        return $display;
    }
}