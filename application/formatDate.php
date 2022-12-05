<?php
function format_date(string $original): string
{
    $splitted = explode('-', $original);
    $month = ["01" => "Janvier",
        "02" => "Fevrier",
        "03" => "Mars",
        "04" => "Avril",
        "05" => "Mai",
        "06" => "Juin",
        "07" => "Juillet",
        "08" => "Aout",
        "09" => "Septembre",
        "10" => "Octobre",
        "11" => "Novembre",
        "12" => "Decembre"];
    $days = [
        'Mon' => 'Lundi',
        'Tue' => 'Mardi',
        'Wed' => 'Mercredi',
        'Thu' => 'Jeudi',
        'Fri' => 'Vendredi',
        'Sat' => 'Samedi',
        'Sun' => 'Dimanche'
    ];
    $timestap = strtotime($original);
    $day = date("D", $timestap);
    return $days[$day] . ' ' . $splitted[2] . ' ' . $month[$splitted[1]] . ' ' . $splitted[0];
}