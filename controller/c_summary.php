<?php 

session_start();

require_once PATH_MODELS . "QRCodeGenerator.php";

require_once PATH_MODELS . "PDFGenerator.php";


if(isset($_POST['generate-pdf'])){
    try{
        // On genere le QRCode
        $idUser = $_SESSION['user']->getId();
        $idTicket = $_POST['generate-pdf'];
        $qrcodetext = rand(1, 9);
        /* $filename = QRCodeGenerator::generate($idUser, $idTicket); */
        $generator = new PDFGenerator();
        $generator->savePDF();
    }catch(Exception $e){
        die($e->getMessage());
    }
}

require_once PATH_VIEWS . "summary.php"; 

/* // Une fois qu'on a affiché le QRCode, on le supprime
unlink($filepath); */

