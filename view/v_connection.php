<?php require_once(PATH_VIEWS . 'header.php'); //header of the page 
?>



<form action="get" class="connection">
    Connexion
    <input type="text" class="emailC" placeholder="E-mail...">
    <input type="text" class="passwordC" placeholder="Mot de passe...">
</form>

<div class="line"></div>

<form action="get" class="register">
    Inscription
    <input type="text" class="surname" placeholder="Prénom...">
    <input type="text" class="name" placeholder="Nom...">

    <input type="text" class="emailR" placeholder="E-mail...">

    <input type="text" class="passwordR" placeholder="Mot de passe...">
    <input type="text" class="confirmPasswordR" placeholder="Confirmer mot de passe">
</form>



<?php require_once(PATH_VIEWS . 'footer.php'); //header of the page 
?>