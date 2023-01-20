<?php

class SignInConnectionStrategy implements ConnectionStrategy
{

    public function handle(array $post): array
    {
        $mail = htmlspecialchars($_POST['emailC']);
        $password = htmlspecialchars($_POST['passwordC']);

        $userDAO = new UserDAO();
        $cartDAO = new CartDAO();

        try {
            $user = $userDAO->getUserByEmail($mail, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                $tmp = $cartDAO->getById($user->getId());
                if ($tmp == null) {
                    $tmp = new Cart($user->getId());
                }
                $_SESSION['cart'] = $tmp;

                $resultDisplay['message'] = "Connexion réussie";
                $resultDisplay['type'] = 'success';

            } else {
                $resultDisplay['message'] = "L'adresse mail est incorrecte";
                $resultDisplay['type'] = 'error';
            }
        } catch (WrongPasswordException $e) {
            $resultDisplay['message'] = "Le mot de passe est incorrect";
            $resultDisplay['type'] = 'error';
        }

        return array('resultDisplayLogIn' => $resultDisplay, 'type' => $resultDisplay['type']);
    }
}