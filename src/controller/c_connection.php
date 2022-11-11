<?php
require_once PATH_MODELS . 'database/UserDTO.php';
require_once PATH_MODELS . 'database/UserDAO.php';

if (isset($_POST['registerButton'])) {
    $firstname = htmlspecialchars($_POST['firstnameR']);
    $lastname = htmlspecialchars($_POST['lastnameR']);
    $email = htmlspecialchars($_POST['emailR']);
    $password = htmlspecialchars($_POST['passwordR']);
    $confirmPassword = htmlspecialchars($_POST['confirmPasswordR']);

    $resultDisplay = ['message' => '', 'type' => ''];

    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($password == $confirmPassword) {
                $userDTO = new UserDTO();
                $userDAO = new UserDAO();

                $user = new User($userDAO->getLastId()+1, $lastname, $firstname, $password);


            } else {
                $resultDisplay['message'] .=  "Les mots de passe ne correspondent pas" . "<br>";
            }
        } else {
            $resultDisplay['message'] .= "L'adresse mail n'est pas valide" . "<br>";
        }
    } else {
        $resultDisplay['message'] .= "Tous les champs doivent être complétés" . "<br>";
    }

    if (empty($resultDisplay)) {
        $resultDisplay['message'] = "Le compte a bien été créé";
        $resultDisplay['type'] = "success";
    } else {
        $resultDisplay['type'] = "error";
    }

} else if (isset($_POST['connectionButton'])) {
    // TODO : Connection
}

require_once(PATH_VIEWS . 'connection.php');

