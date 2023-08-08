<?php
namespace App\Helpers;

use File;
use Image;

class DateHelper
{
    public static function englishToNepaliYear($date)
{
    $date = date('Y-m-d', strtotime($date));
    $date_explode = explode("-", $date);
    $year = $date_explode[0];
    $month = $date_explode[1];
    $date = $date_explode[2];

    $_bs = DateHelper::getAvailableDates();
    $monthData = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    // Month for leap year
    $lmonth = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    $def_eyy = 1944;    // initial english date.
    $def_nyy = 2000;
    $def_nmm = 9;
    $def_ndd = 17 - 1;  // inital nepali date.
    $total_eDays = 0;
    $day = 7 - 1;

    // Count total no. of days in-terms year
    for ($i = 0; $i < ($year - $def_eyy); $i++) //total days for month calculation...(english)
    {
        if (DateHelper::isLeapYear($def_eyy + $i) === TRUE) {
            for ($j = 0; $j < 12; $j++) {
                $total_eDays += $lmonth[$j];
            }
        } else {
            for ($j = 0; $j < 12; $j++) {
                $total_eDays += $monthData[$j];
            }
        }
    }

    // Count total no. of days in-terms of month
    for ($i = 0; $i < ($month - 1); $i++) {
        if (DateHelper::isLeapYear($year) === TRUE) {
            $total_eDays += $lmonth[$i];
        } else {
            $total_eDays += $monthData[$i];
        }
    }

    // Count total no. of days in-terms of date
    $total_eDays += $date;

    $i = 0;
    $j = $def_nmm;
    $total_nDays = $def_ndd;
    $m = $def_nmm;
    $y = $def_nyy;

    // Count nepali date from array
    while ($total_eDays != 0) {
        $a = $_bs[$i][$j];

        $total_nDays++;     //count the days
        $day++;             //count the days interms of 7 days

        if ($total_nDays > $a) {
            $m++;
            $total_nDays = 1;
            $j++;
        }
        if ($day > 7) {
            $day = 1;
        }
        if ($m > 12) {
            $y++;
            $m = 1;
        }
        if ($j > 12) {
            $j = 1;
            $i++;
        }
        $total_eDays--;
    }

    if ($m < 10) {
        $month = sprintf("%02d", $m);
    } else {
        $month = $m;
    }
    $numDay = $day;
    $year = $y;
    $date = $total_nDays;
    $day = $day;
    $nmonth = $m;
    $numDay = $numDay;
    $date = $year ;

    // Convert to Nepali symbol
    // Sometime date may come in single letter, like 2074-04-3
    // if (isset($date['9'])) {
    //     $date = [$date['0'], $date['1'], $date['2'], $date['3'], $date['4'], $date['5'], $date['6'], $date['7'], $date['8'], $date['9']];
    // } else {
    //     $date = [$date['0'], $date['1'], $date['2'], $date['3'], $date['4'], $date['5'], $date['6'], $date['7'], 0, $date['8']];
    // }

    return $date;
}
//    english to nepali full date
public static function englishToNepali($date)
{
    $date = date('Y-m-d', strtotime($date));
    $date_explode = explode("-", $date);
    $year = $date_explode[0];
    $month = $date_explode[1];
    $date = $date_explode[2];

    $_bs = DateHelper::getAvailableDates();
    $monthData = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    // Month for leap year
    $lmonth = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    $def_eyy = 1944;    // initial english date.
    $def_nyy = 2000;
    $def_nmm = 9;
    $def_ndd = 17 - 1;  // inital nepali date.
    $total_eDays = 0;
    $day = 7 - 1;

    // Count total no. of days in-terms year
    for ($i = 0; $i < ($year - $def_eyy); $i++) //total days for month calculation...(english)
    {
        if (DateHelper::isLeapYear($def_eyy + $i) === TRUE) {
            for ($j = 0; $j < 12; $j++) {
                $total_eDays += $lmonth[$j];
            }
        } else {
            for ($j = 0; $j < 12; $j++) {
                $total_eDays += $monthData[$j];
            }
        }
    }

    // Count total no. of days in-terms of month
    for ($i = 0; $i < ($month - 1); $i++) {
        if (DateHelper::isLeapYear($year) === TRUE) {
            $total_eDays += $lmonth[$i];
        } else {
            $total_eDays += $monthData[$i];
        }
    }

    // Count total no. of days in-terms of date
    $total_eDays += $date;

    $i = 0;
    $j = $def_nmm;
    $total_nDays = $def_ndd;
    $m = $def_nmm;
    $y = $def_nyy;

    // Count nepali date from array
    while ($total_eDays != 0) {
        $a = $_bs[$i][$j];

        $total_nDays++;     //count the days
        $day++;             //count the days interms of 7 days

        if ($total_nDays > $a) {
            $m++;
            $total_nDays = 1;
            $j++;
        }
        if ($day > 7) {
            $day = 1;
        }
        if ($m > 12) {
            $y++;
            $m = 1;
        }
        if ($j > 12) {
            $j = 1;
            $i++;
        }
        $total_eDays--;
    }

    if ($m < 10) {
        $month = sprintf("%02d", $m);
    } else {
        $month = $m;
    }
    $numDay = $day;
    $year = $y;
    $date = $total_nDays;
    $day = $day;
    $nmonth = $m;
    $numDay = $numDay;
    $date = $year . '-' . $month . '-' . $date;

    // Convert to Nepali symbol
    // Sometime date may come in single letter, like 2074-04-3
    if (isset($date['9'])) {
        $date = [$date['0'], $date['1'], $date['2'], $date['3'], $date['4'], $date['5'], $date['6'], $date['7'], $date['8'], $date['9']];
    } else {
        $date = [$date['0'], $date['1'], $date['2'], $date['3'], $date['4'], $date['5'], $date['6'], $date['7'], 0, $date['8']];
    }
    $out = '';
    $out_arr = array_map(array(new DateHelper, 'convertNos'), $date);
    $out = implode('', $out_arr);
    return $out;
}




public static function isLeapYear($year)
{
    $a = $year;
    if ($a % 100 == 0) {
        if ($a % 400 == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    } else {
        if ($a % 4 == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}


public static function convertNos($nos)
{
    $n = '';
    switch ($nos) {
        case "०":
            $n = "०";
            break;
        case "१":
            $n = 1;
            break;
        case "२":
            $n = 2;
            break;
        case "३":
            $n = 3;
            break;
        case "४":
            $n = 4;
            break;
        case "५":
            $n = 5;
            break;
        case "६":
            $n = 6;
            break;
        case "७":
            $n = 7;
            break;
        case "८":
            $n = 8;
            break;
        case "९":
            $n = 9;
            break;
        case "0":
            $n = "०";
            break;
        case "1":
            $n = "१";
            break;
        case "2":
            $n = "२";
            break;
        case "3":
            $n = "३";
            break;
        case "4":
            $n = "४";
            break;
        case "5":
            $n = "५";
            break;
        case "6":
            $n = "६";
            break;
        case "7":
            $n = "७";
            break;
        case "8":
            $n = "८";
            break;
        case "9":
            $n = "९";
            break;
        case "-":
            $n = "-";
            break;
        case ":":
            $n = ":";
            break;
    }
    return $n;
}



public static function getAvailableDates()
{
    $nepaliDates = array(
        0 => array(2000, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        1 => array(2001, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        2 => array(2002, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        3 => array(2003, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        4 => array(2004, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        5 => array(2005, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        6 => array(2006, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        7 => array(2007, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        8 => array(2008, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        9 => array(2009, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        10 => array(2010, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        11 => array(2011, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        12 => array(2012, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        13 => array(2013, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        14 => array(2014, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        15 => array(2015, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        16 => array(2016, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        17 => array(2017, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        18 => array(2018, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        19 => array(2019, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        20 => array(2020, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        21 => array(2021, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        22 => array(2022, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        23 => array(2023, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        24 => array(2024, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        25 => array(2025, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        26 => array(2026, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        27 => array(2027, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        28 => array(2028, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        29 => array(2029, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        30 => array(2030, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        31 => array(2031, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        32 => array(2032, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        33 => array(2033, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        34 => array(2034, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        35 => array(2035, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        36 => array(2036, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        37 => array(2037, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        38 => array(2038, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        39 => array(2039, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        40 => array(2040, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        41 => array(2041, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        42 => array(2042, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        43 => array(2043, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        44 => array(2044, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        45 => array(2045, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        46 => array(2046, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        47 => array(2047, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        48 => array(2048, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        49 => array(2049, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        50 => array(2050, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        51 => array(2051, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        52 => array(2052, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        53 => array(2053, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        54 => array(2054, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        55 => array(2055, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        56 => array(2056, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        57 => array(2057, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        58 => array(2058, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        59 => array(2059, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        60 => array(2060, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        61 => array(2061, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        62 => array(2062, 30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31),
        63 => array(2063, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        64 => array(2064, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        65 => array(2065, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        66 => array(2066, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        67 => array(2067, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        68 => array(2068, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        69 => array(2069, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        70 => array(2070, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        71 => array(2071, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        72 => array(2072, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        73 => array(2073, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        74 => array(2074, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        75 => array(2075, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        76 => array(2076, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        77 => array(2077, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        78 => array(2078, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        79 => array(2079, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        80 => array(2080, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        81 => array(2081, 31, 31, 32, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        82 => array(2082, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        83 => array(2083, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        84 => array(2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        85 => array(2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        86 => array(2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        87 => array(2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30),
        88 => array(2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        89 => array(2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        90 => array(2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30)
    );
    return $nepaliDates;
}
}
