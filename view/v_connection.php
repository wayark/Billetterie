<?php
require_once(PATH_VIEWS . 'header.php'); //header of the page
/**
 * @var $resultDisplay array    Exist if register button has been clicked
 *                              Contains the text and display type to show
 */
?>

    <section class="connectionPage">
        <div class="connection-register-frame">
            <form method="post" action="./index.php?page=connection" class="connectionForm">
                <p>Connexion</p>
                <input name="emailC" type="text" class="emailC" placeholder="E-mail...">
                <input name="passwordC" type="text" class="passwordC" placeholder="Mot de passe...">
                <button name="signIn" class="connectionButton">Connexion</button>
            </form>

            <div class="line"></div>

            <div>
                <form method="post" action="./index.php?page=connection" class="connectionForm">
                    <p>Inscription</p>
                    <div>
                        <input name="firstnameR" type="text" class="surname" placeholder="Prénom...">
                        <input name="lastnameR" type="text" class="name" placeholder="Nom...">
                    </div>


                    <input name="emailR" type="text" class="emailR" placeholder="E-mail...">

                    <input name="passwordR" type="text" class="passwordR" placeholder="Mot de passe...">
                    <input name="confirmPasswordR" type="text" class="confirmPasswordR"
                           placeholder="Confirmer mot de passe">

                    <button name="signUp" class="connectionButton">Inscription</button>
                </form>
                <?php
                if (isset($resultDisplay)) {
                    $firstDiv = "<div class='registerDisplay' style='background: ";
                    if ($resultDisplay['type'] == 'success') {
                        $firstDiv .= "lightgreen'>";
                    } else {
                        $firstDiv .= "lightcoral'>";
                    }
                    echo $firstDiv;

                    echo $resultDisplay['message'];

                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </section>

<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page 
?>