<?php

class DateDisplayService
{
    public static function formatDate(string $original) : string {
        if (empty($original)) return "00/00/0000";
        $numbers = explode("-", $original);

        return $numbers[2] . "/" . $numbers[1] . "/" . $numbers[0];
    }

    public static function formatDatetime(string $original): string
    {
        $dateCut = explode(" ", $original);
        $hourTime = explode(":", $dateCut[1]);
        $splitted = explode('-', $dateCut[0]);

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

        return $days[$day] . ' ' . $splitted[2] . ' ' . $month[$splitted[1]] . ' ' . $splitted[0] .
            ' à ' . $hourTime[0] . 'h' . $hourTime[1];
    }
}