<?php

require_once PATH_APPLICATION . 'fpdf/vendor/autoload.php';
use Fpdf\Fpdf;
class PDFGenerator extends FPDF {

    private $qrcodefilepath;

    private $orientation;
    private $size;
    private $unit;
    /**
     * @var array{ticket: Ticket, quantity: int}
     */
    private array $tickets_quantity;

    function __construct(string $qrcodefilepath, array $tickets) {
        $this->tickets_quantity = $tickets;
        $this->qrcodefilepath = $qrcodefilepath;

        // Paramètres de la page de base
        $this->orientation = 'P';
        $this->size = 'A4';
        // unités en mm
        $this->unit = 'mm';
        parent::__construct($this->orientation, $this->unit, $this->size);

        $this->AddPage();
        $this->initPDF();
    }

    function initPDF() {
        $this->header();
        $this->body();
        $this->footer();
    }

    function header() {
        $this->SetFont('Arial', 'BU', 22);
        $this->Cell(0, 0, $this->removeAccents($this->tickets_quantity['ticket']->getEvent()->getArtist()->getStageName()), 0, 1, 'C');
        // Mettre un trait horizontal noir de 1mm 
        $this->SetDrawColor(156, 146, 146);
        $this->SetLineWidth(1);
        $this->Line(0, 20, 210, 20);
    }

    function body() {
        $this->bodyRight();
        $this->bodyLeft();
    }

    function bodyRight() {
        // Mettre une image à droite en bas du titre
        $this->Image($this->qrcodefilepath, 120, 25, 85, 90);

        // Placer le texte en dessous de l'image
        $initialY = 120;
        $text = ["Ce QR-code ne pourra etre", "utilise qu'une seule fois.", "Il vous permettra", " d'acceder a votre evenement."];
        $margin = [8, 10, 18, 5];
        $initialX = 122;
        $this->SetY($initialY);
        $this->SetFont('Arial', 'B', 14);

        $i = 0;

        foreach ($text as $line) {
            $newX = $initialX + $margin[$i];
            $this->SetX($newX);

            $this->Cell(0, 0, $line);

            $initialY += 10;
            $this->SetY($initialY);

            $i++;
        }

        // Trait juste en dessous du texte
        $this->SetDrawColor(224, 216, 211);
        $this->SetLineWidth(1.5);
        $this->Line(118, $initialY, 205, $initialY);
        
        // Faire un carré avec bords arrondis
        $this->SetLineWidth(7);
        $this->Rect($initialX - 5, 170, 90, 50, 10, 'DF');
        // Remplir le carré avec une image
        $this->SetX($initialX);
        $this->Image($this->tickets_quantity['ticket']->getEvent()->getEventInfo()->getPicture()->getPicturePath(), $initialX - 5, 170, 90, 50);

        $this->SetY(232);
        $this->SetFont('Arial', 'BU', 13);
        $this->SetTextColor(192, 163, 139);
        $this->Cell(0, 0, "Pour toute question, veuillez nous contacter par les informations disponibles sur notre page", 0, 1, 'C');
        $this->SetY(238);
        $this->Cell(0, 0, "contact", 0, 1, 'C');
    }

    function bodyLeft() {
        // Rectangle de base
        $this->SetY(25);
        $this->SetX(10);
        $this->SetLineWidth(4.5);
        $this->Rect(5, 28.25, 104, 193, 10, 'D');

        // Image waticket 
        $this->Image(PATH_IMAGES . "/logos/logoWatiGold.png", 17, 32, 80, 30);

        $quantity = $this->tickets_quantity['quantity'];
        $ticket = $this->tickets_quantity['ticket'];
        $user = $this->tickets_quantity['ticket']->getOwner();
        $event = $this->tickets_quantity['ticket']->getEvent();
        $date = DateDisplayService::formatDatetime($event->getEventInfo()->getEventDate());
        $date = explode("à", $date);

        $informations = [
            [[$quantity, 0], ["place pour ", 5], ["- " . $this->removeAccents($event->getEventInfo()->getEventName()), 0]],
            [["Nom : ", 0], [$this->removeAccents($user->getLastName()), 15]],
            [["Prenom : ", 0], [$this->removeAccents($user->getFirstName()), 21]],
            [["Lieu : ", 0], [$this->removeAccents($event->getEventPlace()->getPlaceName()), 14]],
            [["Ville : ", 0], [$this->removeAccents($event->getEventPlace()->getCity()), 14]],
            [["Adresse : ", 0], [$this->removeAccents($event->getEventPlace()->getStreet()), 22]],
            [["Date : ", 0], [$date[0], 14]],
            [["Heure : ", 0], [$date[1], 18]],
            [["Prix unite :", 0], [$ticket->getTicketPricing()->getPrice() . ' euros', 26]],
            [["Vous avez choisi :"], [$this->removeAccents($ticket->getTicketPricing()->getName())]]
        ];

        $initialY = 67;
        $initialX = 12;
        $gap = 13;
        $margin = 5;
        
        $j = 0;
        foreach ($informations as $info) {
            $sizeTab = count($informations);
            if ($j == 0) {
                $i = 0;
                $this->SetY($initialY);
                foreach ($info as $newtext) {
                    if($i == 0) {
                        $this->SetX($initialX);
                        $this->SetFont('Arial', 'B', 14);
                        $this->SetTextColor(154, 105, 105);
                    } else if($i == 1) {
                        $this->SetFont('Arial', '', 14);
                        $this->SetX($initialX + $newtext[1]);
                        $this->SetTextColor(0, 0, 0);
                    } else {
                        $initialY += $gap;
                        $this->SetY($initialY);
                        $this->setX($initialX + $margin);
                        $this->SetFont('Arial', 'B', 14);
                        $this->SetTextColor(154, 105, 105);
                    }
                    $this->Cell(0, 0, $newtext[0], 0, 1, 'L');
                    $i++;
                }
            } else if($j != $sizeTab - 1) {
                $this->SetY($initialY + ($gap * $j));
                $i = 0;
                foreach ($info as $newtext) {
                    if($i == 1) {
                        $this->SetFont('Arial', 'B', 14);
                        $this->SetTextColor(154, 105, 105);
                    } else {
                        $this->SetFont('Arial', '', 14);
                        $this->SetTextColor(0, 0, 0);
                    }
                    $this->setX($initialX + $newtext[1]);
                    $this->Cell(0, 0, $newtext[0], 0, 1, 'L');
                    $i++;
                }
            } else {
                $this->SetY($initialY + (13 * $j));
                $i = 0;

                // On ecrit la derniere case du tableau
                $this->setX($initialX);
                $this->SetFont('Arial', '', 14);
                $this->SetTextColor(0, 0, 0);
                $this->Cell(0, 0, $info[0][0], 0, 1, 'L');

                $this->SetY($initialY + ($gap * $j) + $gap);
                $this->SetX($initialX + $margin);
                $this->SetFont('Arial', 'B', 14);
                $this->SetTextColor(154, 105, 105);
                $this->Cell(0, 0, $info[1][0], 0, 1, 'L');
            }
            $j++;
        }
    }

    function footer() {
        $this->SetY(275);

        $this->SetFont('Arial', 'I', 13);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 0, "Merci pour votre confiance.", 0, 1, 'R');

        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(208, 186, 169);
        $this->Cell(0, 0, "Waticket.com", 0, 1, 'L');
    }

    function savePDF() {
        $this->Output('F', PATH_ASSETS . "ticket/ticket.pdf");
        $this->removeQRCode();
    }

    function downloadPDF() {
        $this->Output("D", "ticket.pdf");
        $this->removeQRCode();
    }

    function showPDF() {
        $this->Output("I", "ticket.pdf");
        $this->removeQRCode();
    }

    function removeQRCode() {
        unlink($this->qrcodefilepath);
    }

    private function removeAccents(string $str) {
        $str = htmlentities($str, ENT_NOQUOTES, 'utf-8');
        $str = preg_replace('#\&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml)\;#', '\1', $str);
        $str = preg_replace('#\&([A-za-z]{2})(?:lig)\;#', '\1', $str);
        $str = preg_replace('#\&[^;]+\;#', '', $str);
        return $str;
    }
}