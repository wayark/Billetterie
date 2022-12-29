<?php

require_once PATH_MODELS . 'Presenter.php';
require_once PATH_PRESENTER . 'state/connection/AlreadySignInConnectionState.php';
require_once PATH_PRESENTER . 'state/connection/SignInConnectionState.php';
require_once PATH_PRESENTER . 'state/connection/SignUpConnectionState.php';
require_once PATH_PRESENTER . 'state/connection/DefaultConnectionState.php';

class ConnectionPresenter extends Presenter
{

    private ConnectionState $state;
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
        if (isset($_SESSION['user'])) {
            $this->state = new AlreadySignInConnectionState();
        } else if (isset($this->post['signUp'])) {
            $this->state = new SignUpConnectionState();
        } else if (isset($this->post['signIn'])) {
            $this->state = new SignInConnectionState();
        } else {
            $this->state = new DefaultConnectionState();
        }

        $this->display = $this->state->handle($this->post);
    }


    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        if (!isset($this->display['resultDisplayRegister'])) $this->display['resultDisplayRegister'] = null;
        if (!isset($this->display['resultDisplayLogIn'])) $this->display['resultDisplayLogIn'] = null;
        return $this->display;
    }
}