<?php

require_once PATH_APPLICATION . '/fpdf/vendor/autoload.php';
use Fpdf\Fpdf;
class PDFGenerator extends FPDF {

    private $orientation;
    private $size;
    private $unit;

    function __construct() {
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
        $this->Cell(0, 0, "Damso - Transbordeur", 0, 1, 'C');
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
        $this->Image(PATH_IMAGES . "qrcodes/qrcode-user2--277622.png", 120, 25, 85, 90);

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
        $this->Image(PATH_IMAGES . "events/wayark.jpg", $initialX - 5, 170, 90, 50);

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
        $this->Rect(5, 28, 104, 193, 10, 'D');

        // Image waticket 
        $this->Image(PATH_IMAGES . "/logos/logoWatiGold.png", 17, 32, 80, 30);

        $informations = [
            [1, "place pour ", "Damso - Concert"],
            ["Lieu : ", "Transbordeur"],
            ["Ville : ", "Lyon"],
            ["Adresse : ", "6 rue de la République"],
            ["Date : ", "12/12/2019"],
            ["Heure : ", "21h30"],
            ["Prix unité :", "20€"],
            ["Vous avez choisi :", "Fosse"]
        ];

        
    }

    function footer() {
        $this->SetY(275);

        $this->SetFont('Arial', '', 15);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 0, "Merci pour votre confiance.", 0, 1, 'R');

        $this->SetFont('Arial', 'BI', 14);
        $this->SetTextColor(208, 186, 169);
        $this->Cell(0, 0, "Waticket.com", 0, 1, 'L');
    }

    function savePDF() {
        $this->Output('F', PATH_ASSETS . "ticket/ticket.pdf");
    }
}