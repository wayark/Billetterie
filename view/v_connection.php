<?php
require_once(PATH_VIEWS . 'header.php'); //header of the page
/**
 * @var array{
 *     resultDisplayRegister: ?array<string, string>,
 *     resultDisplayLogIn: ?array<string, string>,
 *     type: string
 * } $result contains the result of the presenter
 */
?>
<head>
    <link rel="stylesheet" href=<?= PATH_CSS . "connection.css" ?>>
    <link rel="stylesheet" href=<?= PATH_MEDIA . "Connection.css" ?>>
    <title>Connexion</title>
</head>    

    <section class="connectionPage">
        <div class="connection-register-frame">
            <div>
                <form method="post" action="./?page=connection" class="connectionForm">
                    <p>Connexion</p>
                    <input name="emailC" type="text" class="emailC" placeholder="E-mail...">
                    <input name="passwordC" type="password" class="passwordC" placeholder="Mot de passe...">
                    <button name="signIn" class="connectionButton">Connexion</button>
                </form>

                <?= ErrorDisplayService::displayError($result['resultDisplayLogIn'], 'registerDisplay') ?>
            </div>

            <div class="line"></div>
            <div>
                <form method="post" action="./?page=connection" class="connectionForm">
                    <p>Inscription</p>
                    <div>
                        <input name="firstnameR" type="text" class="surname" placeholder="Prénom...">
                        <input name="lastnameR" type="text" class="name" placeholder="Nom...">
                    </div>


                    <input name="emailR" type="email" class="emailR" placeholder="E-mail...">

                    <input name="passwordR" type="password" class="passwordR" placeholder="Mot de passe...">
                    <input name="confirmPasswordR" type="password" class="confirmPasswordR"
                           placeholder="Confirmer mot de passe">

                    <button name="signUp" class="connectionButton">Inscription</button>
                </form>
                <?= ErrorDisplayService::displayError($result['resultDisplayRegister'], "registerDisplay"); ?>
            </div>
        </div>
    </section>

<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page 
?>