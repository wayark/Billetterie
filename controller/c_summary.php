<?php
/**
 * @var Cart $cart
 * @var User $user
 */
require_once PATH_MODELS . "QRCodeGenerator.php";

require_once PATH_MODELS . "PDFGenerator.php";

function generateHTMLEvent(Event $event, int $quantity, bool $isLast) : string
{
    $result = '<div class="event-purchased flex-column">
            <div class="nb-tickets-purchased flex-row">
                <h1 class="to-modify">'. $quantity .'</h1>
                <h1>tickets pour :</h1>
                <h1 class="quote">"</h1>
                <h1 class="to-modify">'. $event->getEventInfo()->getEventName() .'</h1>
                <h1 class="quote">"</h1>
            </div>
            <div class="right-part-event flex-row">  
                <a href="./?page=event&amp;id=" class="link-to-event">
                    <img src="' . $event->getEventInfo()->getPicture()->getPicturePath() . '" alt="event" class="event-img">
                </a>
                <div class="event-info flex-column">
                    <h1 class="type-event">'. StringService::cutAtFirstParagraph($event->getEventInfo()->getEventDescription()) .'</h1>
                    <div class="date-event-container flex-row">
                        <h1 class="date-event">Le</h1>
                        <h1 class="date-event">'. DateDisplayService::formatDatetime($event->getEventInfo()->getEventDate()) .'</h1>
                    </div>
                    <h1 class="adress-event">'. $event->getEventPlace()->getStreet() .'</h1>
                    <h1 class="city-event">' . $event->getEventPlace()->getCity() .'</h1>
                    <form action="./?page=summary" method="post" class="button-generate-pdf">
                        <button type="submit" name="generate-pdf" class="flex-row">
                            <p>Télécharger mon billet</p>
                            <img src="./asset/image//logos/pdf-icon.png" alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="bar"></div>' . ($isLast ? "<div class=\"bar\"></div>" : "<div class=\"last-bar\"></div>") .'</div>';
    
    return $result;
}

if (isset($_SESSION['cart']))
{
    $ticketDAO = new TicketDAO();
    $ticketDTO = new TicketDTO();
    $pricingDAO = new TicketPricingDAO();

    $resultDisplay = array('events' => "", 'numberArticles' => 0);

    $cart = $_SESSION['cart'];
    $user = $_SESSION['user'];
    $lastEvent = array_keys($cart->getInCartPricing())[count($cart->getInCartPricing()) - 1];
    foreach ($cart->getInCartPricing() as $pricingId => $quantity) {
        $pricing = $pricingDAO->getById($pricingId);
        $ticket = new Ticket($ticketDAO->getLastId() + 1, $pricing->getEvent(), $user->getFavoriteMethod(),$pricing, $user,
            $pricing->getEvent()->getIdEvent() . '-' . ($ticketDAO->getLastId() + 1));
        $cart->remove($pricingId, $quantity);

        $ticketDTO->add($ticket);

        if ($pricing->getEvent()->getIdEvent() == $lastEvent) {
            $resultDisplay['events'] .= generateHTMLEvent($pricing->getEvent(), $quantity, true);
        } else {
            $resultDisplay['events'] .= generateHTMLEvent($pricing->getEvent(), $quantity, false);
        }
        $resultDisplay['numberArticles'] += $quantity;

        unset($_SESSION['cart']->getInCartPricing()[$pricingId]);
    }
}

if(isset($_POST['generate-pdf'])){
    try{
        // On genere le QRCode
        $idUser = $_SESSION['user']->getId();
        $idTicket = $_POST['generate-pdf'];

        // On genere le PDF avec l'emplacement du QRCode
/*         $qrcodefilepath = QRCodeGenerator::generate($idUser, $idTicket);  */
        $qrcodefilepath = QRCodeGenerator::generate(4, 6); 

        // On demarre la temporisation de sortie (ne marche pas sans)
        ob_start();

        // On genere le PDF
        $generator = new PDFGenerator($qrcodefilepath);

        // On telecharge le PDF
        $generator->downloadPDF();

        // On vide le tampon de sortie et desactive la temporisation de sortie
        ob_end_flush();
    }catch(Exception $e){
        die($e->getMessage());
    }
}

require_once PATH_VIEWS . "summary.php";

