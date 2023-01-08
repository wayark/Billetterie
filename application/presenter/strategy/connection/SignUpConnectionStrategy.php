<?php

require_once PATH_PRESENTER . 'strategy/connection/ConnectionStrategy.php';
require_once './model/database/dto/UserDTO.php';
require_once PATH_DAO . 'UserDAO.php';

class SignUpConnectionStrategy implements ConnectionStrategy
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
                    $this->set_error("password", new Exception("Les mots de passe ne correspondent pas"));
                }
            } else {
                $this->set_error("email", new Exception("L'adresse mail n'est pas valide"));
            }
        } else {
            $this->set_error("empty", new Exception("Tous les champs doivent être remplis"));
        }

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
            $this->set_error("alreadyInBase", $e);
        } catch (NoDatabaseException|TypeError $e) {
            $this->set_error("noDatabase", $e);
        } catch (Exception $e) {
            $this->set_error("unknown", $e);
        }

    }

    private function set_error(string $type,$e) {
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
        $this->resultDisplay['trace'] = $e->getTraceAsString();
    }
}