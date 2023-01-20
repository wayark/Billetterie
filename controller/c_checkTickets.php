<?php

$presenter = new TicketsPresenter($_SESSION['tickets']);
$display = $presenter->formatDisplay();
$presetDisplay = $presenter->formatDisplayPreset();

if(isset($_POST['event-code'])) {
        $resultDisplay['events'] = "";
        $resultDisplay['numberArticles'] = 0;
    
        $qrcodefilepath = QRCodeGenerator::generate($_POST['event-code']);
    
        // On demarre la temporisation de sortie (ne marche pas sans)
        ob_start();

        $ticket = null;
        $quantity = 0;
        foreach ($_SESSION['waiting-tickets'] as $info) {
            if ($info['ticket']->getCode() == $_POST['event-code']) {
                $ticket = $info['ticket'];
                $quantity = $info['quantity'];
                break;
                echo $ticket . ' ' . $quantity;
            }
        }
        // On genere le PDF
        $generator = new PDFGenerator($qrcodefilepath, array('ticket' => $ticket, 'quantity' => $quantity));

        // On telecharge le PDF
        $generator->downloadPDF();

        // On vide le tampon de sortie et desactive la temporisation de sortie
        ob_end_flush();
}
require_once PATH_VIEWS . 'checkTickets.php';
