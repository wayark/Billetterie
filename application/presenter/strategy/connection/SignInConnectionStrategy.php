<?php

require_once PATH_PRESENTER . 'strategy/connection/ConnectionState.php';

class SignInConnectionStrategy implements ConnectionStrategy
{

    public function handle(array $post): array
    {

        $mail = htmlspecialchars($_POST['emailC']);
        $password = htmlspecialchars($_POST['passwordC']);

        $userDAO = new UserDAO();
        $user = $userDAO->getUserByEmail($mail, $password);
        if ($user) {
            $_SESSION['user'] = $user;

            $resultDisplay['message'] = "Connexion réussie";
            $resultDisplay['type'] = 'success';

        } else {
            $resultDisplay['message'] = "L'adresse mail ou le mot de passe est incorrect";
            $resultDisplay['type'] = 'error';
        }
        return array('resultDisplayLogIn' => $resultDisplay, 'type' => $resultDisplay['type']);
    }
}