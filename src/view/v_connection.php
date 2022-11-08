<?php require_once(PATH_VIEWS . 'header.php'); //header of the page 
?>

<section class="connectionPage">
    <div class="connection-register-frame">
        <form method="post" action="./index.php?page=connection" class="connectionForm">
            <p>Connexion</p>
            <input type="text" class="emailC" placeholder="E-mail...">
            <input type="text" class="passwordC" placeholder="Mot de passe...">
            <button class="connectionButton">Connexion</button>
        </form>

        <div class="line"></div>

        <form method="post" action="./index.php?page=connection" class="connectionForm">
            <p>Inscription</p>
            <div>
                <input type="text" class="surname" placeholder="Prénom...">
                <input type="text" class="name" placeholder="Nom...">
            </div>


            <input type="text" class="emailR" placeholder="E-mail...">

            <input type="text" class="passwordR" placeholder="Mot de passe...">
            <input type="text" class="confirmPasswordR" placeholder="Confirmer mot de passe">

            <button class="connectionButton">Inscription</button>
        </form>
    </div>
</section>

<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page 
?>