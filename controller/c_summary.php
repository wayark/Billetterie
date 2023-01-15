<?php 

session_start();

require_once PATH_MODELS . "QRCodeGenerator.php";

/* $qrcodetext = $_SESSION['user']->getId();  */
$qrcodetext = rand(1, 9);

$filename = QRCodeGenerator::generate($qrcodetext);

/* require_once PATH_VIEWS . "summary.php"; */
require_once PATH_VIEWS . "ticket.php"; 

require_once PATH_MODELS . "PDFGenerator.php";

if(isset($_POST['pay'])){
    try{
        $generator = new PDFGenerator($filename);
        $generator->savePDF();
    }catch(Exception $e){
        die($e->getMessage());
    }
}

/* // Une fois qu'on a affiché le QRCode, on le supprime
unlink($filepath); */

