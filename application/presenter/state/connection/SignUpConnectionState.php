<?php

require_once PATH_PRESENTER . 'state/connection/ConnectionState.php';
require_once PATH_DAO . 'UserDAO.php';

class SignUpConnectionState implements ConnectionState
{
    private array $resultDisplay = array();

    public function handle(array $post): array
    {
        $firstname = htmlspecialchars($post['firstnameR']);
        $lastname = htmlspecialchars($post['lastnameR']);
        $email = htmlspecialchars($post['emailR']);
        $password = htmlspecialchars($post['passwordR']);
        $confirmPassword = htmlspecialchars($post['confirmPasswordR']);

        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($password == $confirmPassword) {
                    $this->createAccount($firstname, $lastname, $email, $password);
                } else {
                    $this->set_error("password");
                }
            } else {
                $this->set_error("email");
            }
        } else {
            $this->set_error("empty");
        }

        print_r($this->resultDisplay);

        return array('resultDisplayRegister' => $this->resultDisplay, 'type' => $this->resultDisplay['type']);
    }

    private function createAccount(string $firstname, string $lastname, string $email, string $password) : void
    {
        try {
            $userDTO = new UserDTO();
            $userDAO = new UserDAO();

            $user = new User($userDAO->getLastId() + 1, $lastname, $firstname, $email,
                password_hash($password, PASSWORD_DEFAULT));


            $userDTO->add($user);

            $_SESSION['user'] = $user;

            $this->resultDisplay['message'] = "Le compte a bien été créé";
            $this->resultDisplay['type'] = "success";

        } catch (UserAlreadyInBaseException $e) {
            $this->set_error("alreadyInBase");
        } catch (NoDatabaseException $e) {
            $this->set_error("noDatabase");
        } catch (Exception $e) {
            $this->set_error("unknown");
        }

    }

    private function set_error(string $type) {
        $messages = [
            "password" => "Les mots de passe ne correspondent pas",
            "email" => "L'adresse mail n'est pas valide",
            "empty" => "Tous les champs doivent être complétés",
            "alreadyInBase" => "L'adresse email est déjà utilisée",
            "noDatabase" => "La base de données n'est pas disponible",
            "unknown" => "Une erreur est survenue"
        ];

        $this->resultDisplay['message'] = $messages[$type];
        $this->resultDisplay['type'] = "error";
    }
}