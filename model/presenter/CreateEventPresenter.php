<?php


class CreateEventPresenter extends Presenter
{

    private ConnectionStrategy $state;
    private array $display;

    public function __construct($get, $post)
    {
        parent::__construct($get, $post);
    }

    /**
     * @inheritDoc
     */
    protected function checkProcess(): void
    {
        if (isset($_POST['createevent'])) {
            $this->state = new MakeCreateEventStrategy();
        } else {
            $this->state = new DefaultCreateEventStrategy();
        }
        
        echo "EwE";

        $this->display = $this->state->handle($this->post);
    }


    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        return $this->display;
    }
}