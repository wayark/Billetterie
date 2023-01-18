<?php 

require_once PATH_MODELS . "QRCodeGenerator.php";

require_once PATH_MODELS . "PDFGenerator.php";


if(isset($_POST['generate-pdf'])){
    try{
        // On genere le QRCode
/*         $idUser = $_SESSION['user']->getId();
        $idTicket = $_POST['generate-pdf']; */
        $qrcodetext = rand(1, 9);

        // On genere le PDF avec l'emplacement du QRCode
        $qrcodefilepath = QRCodeGenerator::generate(rand(1, 9), rand(1, 9)); 
        $generator = new PDFGenerator($qrcodefilepath);

        // On telecharge le PDF
        $generator->downloadPDF();
    }catch(Exception $e){
        die($e->getMessage());
    }
}

require_once PATH_VIEWS . "summary.php";

