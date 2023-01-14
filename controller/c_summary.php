<?php 
require_once PATH_VIEWS . "summary.php";

require_once PATH_MODELS . "PDFGenerator.php";

if(isset($_POST['ok'])){
    $generator = new PDFGenerator();
    die("Error");
}