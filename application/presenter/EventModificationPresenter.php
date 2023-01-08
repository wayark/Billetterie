<?php

require_once PATH_MODELS . 'Presenter.php';
require_once PATH_MODELS . 'Event.php';
require_once PATH_MODELS . 'User.php';
require_once PATH_DAO . 'EventDAO.php';
require_once PATH_DTO . 'EventDTO.php';
require_once PATH_DAO . 'UserDAO.php';
require_once PATH_DAO . 'EventPricingDAO.php';
require_once PATH_DTO . 'EventPricingDTO.php';
require_once PATH_PRESENTER . 'strategy/eventModification/EventModificationStrategy.php';
require_once PATH_PRESENTER . 'strategy/eventModification/UpdateEventModificationStrategy.php';
require_once PATH_PRESENTER . 'strategy/eventModification/DefaultEventModificationStrategy.php';

class EventModificationPresenter extends Presenter
{

    private array $display;
    private Event $currentEvent;
    private EventModificationStrategy $state;

    public function __construct(array $get, array $post)
    {
        parent::__construct($get, $post);
    }

    /**
     * @inheritDoc
     */
    protected function checkProcess(): void
    {
        if (isset($this->get['event'])) {
            $this->state = new UpdateEventModificationStrategy();
        } else {
            $this->state = new DefaultEventModificationStrategy();
        }
        $this->display = $this->state->handle($this->get, $this->post);
        $this->currentEvent = $this->display['event'];
    }

    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        unset($this->display['event']);
        $this->display['event'] = array(
            'id' => $this->currentEvent->getIdEvent(),
            'title' => $this->currentEvent->getEventInfo()->getEventName(),
            'picturePath' => $this->currentEvent->getEventInfo()->getPicture()->getPicturePath(),
            'pictureDescription' => $this->currentEvent->getEventInfo()->getPicture()->getPictureDescription(),
            'dateTime' => format_datetime($this->currentEvent->getEventInfo()->getEventDate())
        );

        return $this->display;
    }
}