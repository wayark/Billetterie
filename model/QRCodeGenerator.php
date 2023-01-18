<?php

require_once PATH_APPLICATION . '/phpqrcode/qrlib.php';

class QRCodeGenerator {
    static function generate($idUser, $idTicket) {

        $size = 500;
        $margin = 1;
        $level = QR_ECLEVEL_L;

        $text = strval($idUser) . "-" . strval($idTicket);

        $filepath = PATH_IMAGES . "qrcodes/qrcode" . $text . ".png";
        $filename = basename($filepath);

        QRcode::png($text, $filepath, $level, $size, $margin);

        $file_error_path = PATH_APPLICATION . "phpqrcode/" . $filename . "-errors.txt";
        if (file_exists($file_error_path)) {
            unlink($file_error_path);
        }
        
        return $filepath;
    }
}