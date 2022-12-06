<?php
require_once(PATH_VIEWS . 'accountManagement.php');
?>
<?php
// Vérifier si le formulaire est soumis
if ( isset( $_GET['submit'] ) ) {
    /* récupérer les données du formulaire en utilisant
       la valeur des attributs name comme clé
      */
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $mail = $_GET['mail'];
    $adresse = $_GET['adresse'];
    // afficher le résultat
    echo '<h3>Informations récupérées en utilisant GET</h3>';
    echo 'Nom : ' . $nom . ' Age : ' . $mail . ' Adresse : ' . $adresse;
    exit;
}
?>
