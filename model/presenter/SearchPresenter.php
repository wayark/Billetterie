<?php

class SearchPresenter extends Presenter
{

    private array $display;
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
        $eventDAO = new EventDAO();
        $this->eventList = $eventDAO->getAll();
        if (isset($this->post['submit-button'])) {
            $this->strategy = new SortAndFilterStrategy();
        } else {
            $this->strategy = new DefaultSearchStrategy();
        }
        $this->display = $this->strategy->handleEventList($this->eventList);
    }

    public function formatDisplay(): array
    {
        return $this->display;
    }
}