<?php
function displayError($errorArray, $class) : string
{
    $ans = "";
    if (isset($errorArray)) {
        $ans .= "<div class='" . $class ."' style='background: ";
        if ($errorArray['type'] == 'success') {
            $ans .= "lightgreen'>";
        } else {
            $ans .= "lightcoral'>";
        }

        $ans .= $errorArray['message'];

        $ans .= "</div>";
    }
    return $ans;
}