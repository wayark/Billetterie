<?php

require_once PATH_APPLICATION . '/phpqrcode/qrlib.php';

class QRCodeGenerator {
    static function generate($text) {
        $rand = rand(0, 1000000);
        $size = 500;
        $margin = 1;
        $level = QR_ECLEVEL_L;
        $filepath = PATH_IMAGES . "qrcode/qrcode-user". $text . "-"  . $rand .".png";
        QRcode::png($text, $filepath, $level, $size, $margin);

        // A chaque creation de QRCode, on supprime le fichier d'erreur
        $filename = basename($filepath);
        unlink(PATH_APPLICATION . "phpqrcode/" . $filename . "-errors.txt");
        
        return $filepath;
    }
}