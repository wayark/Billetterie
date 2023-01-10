<?php
if (session_id() == '') session_start();


if(isset($_POST["addone"])){
    
} else if(isset($_POST["rmone"])) {

} else if(isset($_POST["quantity"])) {
    
}

$presenter = new CartPresenter($_GET, $_POST);
$display = $presenter->formatDisplay();

function putCharS($numberArticles){
    if($numberArticles > 1 || $numberArticles == 0) return "s";
}

require_once PATH_VIEWS . "cart.php";
