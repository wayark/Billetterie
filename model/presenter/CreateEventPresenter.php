<?php


class CreateEventPresenter extends Presenter
{

    private CreateEventStrategy $strategy;
    private array $files;
    private array $display;

    public function __construct($get, $post, $files)
    {
        $this->files = $files;
        parent::__construct($get, $post);
    }

    /**
     * @inheritDoc
     */
    protected function checkProcess(): void
    {
        if (isset($this->post['createevent'])) {
            $this->strategy = new MakeCreateEventStrategy();
        } else {
            $this->strategy = new DefaultCreateEventStrategy();
        }

        $this->display = $this->strategy->handle($this->post, $this->files);
    }


    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        $display = array();
        $display['event-types'] = $this->generateHTMLEventType();
        return $display;
    }

    private function generateHTMLEventType() : string
    {
        $eventTypeDAO = new EventTypeDAO();
        $eventTypes = $eventTypeDAO->getAll();
        $ans = "";

        foreach ($eventTypes as $eventType) {
            $ans .= "<option value='" . $eventType->getId() . "'>" . $eventType->getName() . "</option>";
        }
        return $ans;
    }
}