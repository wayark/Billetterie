<?php 
require_once PATH_VIEWS . "summary.php";

require_once PATH_MODELS . "PDFGenerator.php";
require_once PATH_MODELS . "QRCodeGenerator.php";

QRCodeGenerator::generate($_SESSION['user']->getId());

if(isset($_POST['ok'])){
    $generator = new PDFGenerator();
    die("Error");
}