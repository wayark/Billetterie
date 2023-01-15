<?php

class StringService
{
    public static function endsWith($haystack, $needle): bool
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    public static function cutAtFirstParagraph($text) {
        $splitted = explode("<br>", $text);
        return $splitted[0];
    }

}