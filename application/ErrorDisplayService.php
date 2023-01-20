<?php

class ErrorDisplayService
{
    public static function displayError($errorArray, $class) : string
    {
        $ans = "";
        if (isset($errorArray)) {
            $ans .= "<div class='" . $class ."' style='background: ";
            if ($class == 'success') {
                $ans .= "lightgreen'>";
            } else {
                $ans .= "lightcoral'>";
            }

            $ans .= $errorArray['message'];

            $ans .= "</div>";
        }
        return $ans;
    }
}