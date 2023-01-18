<?php

require_once PATH_APPLICATION . '/phpqrcode/qrlib.php';

class QRCodeGenerator {
    static function generate($idUser, $idTicket) {
        $rand = rand(1, 9);
        $size = 500;
        $margin = 1;
        $level = QR_ECLEVEL_L;
        $text = $idUser . ":" . $idTicket;
        $filepath = PATH_IMAGES . "qrcodes/qrcode-user". $idUser . "-"  . $rand .".png";
        QRcode::png($text, $filepath, $level, $size, $margin);

        // A chaque creation de QRCode, on supprime le fichier d'erreur
        $filename = basename($filepath);
        unlink(PATH_APPLICATION . "phpqrcode/" . $filename . "-errors.txt");
        
        return $filename;
    }
}