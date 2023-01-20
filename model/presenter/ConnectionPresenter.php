<?php


class ConnectionPresenter extends Presenter
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
        if (isset($_SESSION['user'])) {
            $this->state = new AlreadySignInConnectionStrategy();
        } else if (isset($this->post['signUp'])) {
            $this->state = new SignUpConnectionStrategy();
        } else if (isset($this->post['signIn'])) {
            $this->state = new SignInConnectionStrategy();
        } else {
            $this->state = new DefaultConnectionStrategy();
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