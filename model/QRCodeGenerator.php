<?php

require_once PATH_APPLICATION . '/phpqrcode/qrlib.php';

class QRCodeGenerator {
    static function generate($text) {
        $rand = rand(0, 1000000);
        $size = 500;
        $margin = 1;
        $level = QR_ECLEVEL_L;
        $filename = PATH_IMAGES . "/qrcode/qrcode-user". $text . "-"  . $rand .".png";
        QRcode::png($text, $filename, $level, $size, $margin);

        return $filename;
    }
}