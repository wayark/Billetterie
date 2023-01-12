<?php
/**
 * @var $_SESSION array{user: User, cart: Cart}
 */
$presenter = null;
$display = null;
$posted = false;
if (isset($_POST['type']) && isset($_POST['quantity'])) {
    session_start();

    if (isset($_SESSION['user'])) {
        $quantity = $_POST['quantity'];
        if ($quantity == 1)
            $textToDisplay = "Votre ticket a bien été ajouté au panier.";
        else
            $textToDisplay = "Vos tickets ont bien été ajoutés au panier.";

        $posted = true;
        $ticketAddedToCart = $presenter->formatDisplayById($_GET['event'], $_POST['type'], $_POST['quantity']);

        /* Si l'utilisteur avait déjà ce ticket dans son panier, on supprime l'ancien et on ajoute au nouveau la quantité
        de l'ancien */

        $ticketPricingDAO = new TicketPricingDAO();

        $pricing = $ticketPricingDAO->getById($_POST['type']);

        $keyAlreadyExist = $_SESSION['cart']->add($pricing->getIdTicketPricing(), $quantity);

        $cartDTO = new CartDTO();
        if ($keyAlreadyExist) {
            $cartDTO->update($_SESSION['user'], $pricing, $quantity);
        } else {
            $cartDTO->add($_SESSION['user'], $pricing, $quantity);
        }
    }
} 

if (isset($_GET['page']) && !isset($_GET['event']) || isset($_GET['page']) && $_GET['event'] == "") {
    require_once PATH_VIEWS . "404.php";
} else {
    $presenter = new EventPresenter($_GET, $_POST);

    $display = $presenter->formatDisplay();

    require_once PATH_VIEWS . "event.php";
}


        