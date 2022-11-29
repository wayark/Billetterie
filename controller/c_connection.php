<?php
require_once PATH_MODELS . 'database/UserDTO.php';
require_once PATH_MODELS . 'database/UserDAO.php';
require_once PATH_MODELS . 'exception/UserAlreadyInBaseException.php';

if (isset($_POST['signUp'])) {
    $resultDisplayRegister = handle_signUp();
} else if (isset($_POST['signIn'])) {
    $registerDisplayLogIn = handle_signIn();
}

require_once(PATH_VIEWS . 'connection.php');

function handle_signUp(): array
{
    $firstname = htmlspecialchars($_POST['firstnameR']);
    $lastname = htmlspecialchars($_POST['lastnameR']);
    $email = htmlspecialchars($_POST['emailR']);
    $password = htmlspecialchars($_POST['passwordR']);
    $confirmPassword = htmlspecialchars($_POST['confirmPasswordR']);

    $resultDisplay = ['message' => '', 'type' => ''];

    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($password == $confirmPassword) {
                try {
                    $userDTO = new UserDTO();
                    $userDAO = new UserDAO();

                    $user = new User($userDAO->getLastId()+1, $lastname, $firstname, $email,
                        password_hash($password, PASSWORD_DEFAULT));


                    $userDTO->addUser($user);

                    $resultDisplay['message'] = "Le compte a bien été créé";
                    $resultDisplay['type'] = "success";

                } catch (UserAlreadyInBaseException $e) {
                    $resultDisplay['message'] = "L'adresse email est déjà utilisée";
                    $resultDisplay['type'] = 'error';
                } catch (NoDatabaseException $e) {
                    $resultDisplay['message'] = "La base de données n'est pas disponible";
                    $resultDisplay['type'] = 'error';
                } catch (Exception $e) {
                    $resultDisplay['message'] = "Une erreur est survenue";
                    $resultDisplay['type'] = 'error';
                }

            } else {
                $resultDisplay['message'] .= "Les mots de passe ne correspondent pas" . "<br>";
                $resultDisplay['type'] = "error";
            }
        } else {
            $resultDisplay['message'] .= "L'adresse mail n'est pas valide" . "<br>";
            $resultDisplay['type'] = "error";
        }
    } else {
        $resultDisplay['message'] .= "Tous les champs doivent être complétés" . "<br>";
        $resultDisplay['type'] = "error";
    }
    return $resultDisplay;
}

function handle_signIn(): array {
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
    return $resultDisplay;

}