<?php require_once(PATH_VIEWS . 'accountManagement.php');

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nomA'];
    $prenom = $_POST['prenomA'];
    $mail = $_POST['mailA'];

    // Do something with the data, e.g. send it to a database or email it to someone
}
?>
<script>
  document.getElementById('prenomA').innerHTML = 'Name: ' + <?php echo json_encode($nom); ?>;
  document.getElementById('nomA').innerHTML = 'Name: ' + <?php echo json_encode($mail); ?>;
  document.getElementById('mailA').innerHTML = 'Name: ' + <?php echo json_encode($prenom); ?>;
</script>