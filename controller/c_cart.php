<?php

if(isset($_POST["addone"]) && isset($_POST["id"])){
    $cartDTO = new CartDTO();
    $cartDTO->addOne($_SESSION["user"], $_POST["id"]);
    $_SESSION["cart"]->add($_POST["id"], 1);
} else if(isset($_POST["rmone"]) && isset($_POST["id"])) {
    $cartDTO = new CartDTO();
    $cartDTO->removeOne($_SESSION["user"], $_POST["id"]);
    $_SESSION["cart"]->remove($_POST["id"], 1);
} else if(isset($_POST["quantity"]) && isset($_POST["id"])) {
    $newQuantity = intval($_POST["quantity"]);
    $cartDTO = new CartDTO();
    $cartDTO->setQuantity($_SESSION["user"], $_POST["id"], $newQuantity);
    $_SESSION["cart"]->set($_POST["id"], $newQuantity);
} else if(isset($_POST["delete"]) && isset($_POST["id"])) {
    $cartDTO = new CartDTO();
}

$presenter = new CartPresenter($_GET, $_POST);
$display = $presenter->formatDisplay();

function putCharS($numberArticles){
    if($numberArticles > 1 || $numberArticles == 0) return "s";
}

require_once PATH_VIEWS . "cart.php";
