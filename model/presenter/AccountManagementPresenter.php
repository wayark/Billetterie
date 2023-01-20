<?php

class AccountManagementPresenter extends Presenter
{

    private array $display = array();
    private User $currentUser;
    private array $methods;
    private AccountManagementStrategy $state;
    private array $files;

    public function __construct(array $get, array $post, array $files)
    {
        $this->files = $files;
        parent::__construct($get, $post);
    }

    /**
     * @inheritDoc
     */
    protected function checkProcess(): void
    {
        $paymentDAO = new PaymentMethodDAO();
        $this->currentUser = $_SESSION['user'];
        $this->methods = $paymentDAO->getAll();

        if (isset($this->get['strategy']) && $this->get['strategy'] == 'changeType') {
            $this->state = new ChangeTypeAccountManagementStrategy();
        } else if (isset($this->post['submit'])) {
            $this->state = new UpdateAccountManagementStrategy();
        } else {
            $this->state = new DefaultAccountManagementStrategy();
        }
        $this->display['resultDisplay'] = $this->state->handle($this->currentUser, $this->post, $this->files);
    }

    /**
     * @inheritDoc
     */
    public function formatDisplay(): array
    {
        $this->display['user'] = array(
            'picturePath' => $this->currentUser->getProfilePicture()->getPicturePath(),
            'pictureDescription' => $this->currentUser->getProfilePicture()->getPictureDescription(),
            'firstName' => $this->currentUser->getFirstName(),
            'lastName' => $this->currentUser->getLastName(),
            'mail' => $this->currentUser->getMail(),
            'birthDateNoFormat' => $this->currentUser->getBirthDate(),
            'birthDate' => DateDisplayService::formatDate($this->currentUser->getBirthDate()),
            'address' => $this->currentUser->getAddress(),
            'pictureFileName' => substr($this->currentUser->getProfilePicture()->getPicturePath(), strlen(PATH_IMAGES . 'users/')),
            'favoritePaymentMethod' => $this->currentUser->getFavoriteMethod()->getPaymentMethodName()
        );

        $this->display['paymentMethods'] = $this->displayStringPaymentMethods();
        $this->display['buttons'] = $this->displayStringButtons();

        if ($this->currentUser->getRole()->getId() == 1) {
            $this->display['titre'] = 'Gestion du compte organisateur';
        } else {
            $this->display['titre'] = 'Gestion du compte client';
        }

        return $this->display;
    }

    private function displayStringPaymentMethods(): string
    {
        $ans = "";
        foreach ($this->methods as $method) {
            $ans .= '<option value="' . $method->getIdPaymentMethod() . '"';
            if ($method->getIdPaymentMethod() == $this->currentUser->getFavoriteMethod()->getIdPaymentMethod()) {
                $ans .= ' selected';
            }
            $ans .= ">" . $method->getPaymentMethodName() . "</option>";
        }
        return $ans;
    }

    private function displayStringButtons(): string
    {
        function surround(string $tag, string $attributes, string $content): string
        {
            return "<$tag $attributes>$content</$tag>";
        }

        function createStyleButton(string $content): string
        {
            return '<button class="styleButton">' . $content . '</button>';
        }

        function createButton(string $content, string $url): string
        {
            return surround('a', 'href="' . $url . '"', createStyleButton($content));
        }

        $ans = createButton("Changer mon mot de passe", "./index.php?page=accountManagement");
        $ans .= createButton("Supprimer mon compte", "./index.php?page=accountManagement");

        if ($this->currentUser->getRole()->getId() == 1) {
            $ans .= createButton("Gérer mes événements", "./index.php?page=eventList");
        } else {
            $ans .= createButton("Gérer mes billets", "./index.php");
            $ans .= createButton("Passer organisateur", "./index.php?page=accountManagement&strategy=changeType");
        }
        return $ans;
    }

    public function getDataInJSON(){
        $cart = $_SESSION["cart"];
        $data['user'] = array(
            'picturePath' => $this->currentUser->getProfilePicture()->getPicturePath(),
            'pictureDescription' => $this->currentUser->getProfilePicture()->getPictureDescription(),
            'firstName' => $this->currentUser->getFirstName(),
            'lastName' => $this->currentUser->getLastName(),
            'mail' => $this->currentUser->getMail(),
            'birthDateNoFormat' => $this->currentUser->getBirthDate(),
            'birthDate' => DateDisplayService::formatDate($this->currentUser->getBirthDate()),
            'address' => $this->currentUser->getAddress(),
            'pictureFileName' => substr($this->currentUser->getProfilePicture()->getPicturePath(), strlen(PATH_IMAGES . 'users/')),
            'favoritePaymentMethod' => $this->currentUser->getFavoriteMethod()->getPaymentMethodName(),
            'role' => $this->currentUser->getRole()->__toString(),
            'nb-items-cart' => $cart->getNbItems(),
            'total-price-cart' => $cart->getTotalPrice(),

        );
        $path_file = PATH_ASSETS . "data/data-" . $this->currentUser->getMail() . ".json";
        $file_name = basename($path_file);
        $content = json_encode($data['user']);

        file_put_contents($path_file, $content);
        
        header("Content-type: application/force-download");
        header("Content-Disposition: attachment; filename=".$file_name);
        readfile($path_file);
        
        unlink($path_file);

        Exit();
    }

}
?>
