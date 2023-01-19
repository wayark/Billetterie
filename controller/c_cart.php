<?php

if(isset($_POST["addone"]) && isset($_POST["id"])){
    echo "Add One : ".$_POST["id"];
    $cartDTO = new CartDTO();
    $cartDTO->addOne($_SESSION["user"], $_POST["id"]);
} else if(isset($_POST["rmone"]) && isset($_POST["id"])) {
    echo "Remove One :" . $_POST["id"];
    $cartDTO = new CartDTO();
    $cartDTO->removeOne($_SESSION["user"], $_POST["id"]);
} else if(isset($_POST["quantity"]) && isset($_POST["id"])) {
    echo "Update" . $_POST["id"];
    $newQuantity = intval($_POST["quantity"]);
    $cartDTO = new CartDTO();
    $cartDTO->setQuantity($_SESSION["user"], $_POST["id"], $newQuantity);
}



$presenter = new CartPresenter($_GET, $_POST);
$display = $presenter->formatDisplay();

function putCharS($numberArticles){
    if($numberArticles > 1 || $numberArticles == 0) return "s";
}

require_once PATH_VIEWS . "cart.php";
