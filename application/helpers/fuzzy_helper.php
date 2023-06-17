<?php


//RUMUS ANGGOTA
function AnggotaRingan($x)
{
    if ($x <= 3) {
        return 1;
    } elseif ($x <= 4.5 && $x > 3) {
        return number_format((4.5 - $x) / (4.5 - 3), 2);
    } else {
        return 0;
    }
}

function AnggotaParah($x)
{
    if ($x <= 3 || $x >= 7.5) {
        return 0;
    } elseif (3 <= $x && $x <= 4.5) {
        return number_format(($x - 3) / (4.5 - 3), 2);
    } elseif (4.5 <= $x && $x <= 6) {
        return 1;
    } elseif (6 <= $x && $x <= 7.5) {
        return number_format((7.5 - $x) / (7.5 - 6), 2);
    }
}

function AnggotaSangatParah($x)
{
    if ($x <= 6) {
        return 0;
    } elseif (6 <= $x && $x <= 7.5) {
        return number_format(($x - 6) / (7.5 - 6), 2);
    } elseif ($x >= 7.5) {
        return 1;
    }
}


function NamaAnggotaRingan($x)
{
    if ($x <= 3) {
        return "Ringan";
    } elseif ($x <= 4.5 && $x > 3) {
        return "Ringan";
    } else {
        return "Ringan";
    }
}

function NamaAnggotaParah($x)
{
    if ($x <= 3 || $x >= 7.5) {
        return "Parah";
    } elseif (3 <= $x && $x <= 4.5) {
        return "Parah";
    } elseif (4.5 <= $x && $x <= 6) {
        return "Parah";
    } elseif (6 <= $x && $x <= 7.5) {
        return "Parah";
    }
}

function NamaAnggotaSangatParah($x)
{
    if ($x <= 6) {
        return "Sangat Parah";
    } elseif (6 <= $x && $x <= 7.5) {
        return "Sangat Parah";
    } elseif ($x >= 7.5) {
        return "Sangat Parah";
    }
}

//RUMUS RULE MENCARI NILAI MIN
function findMin($x, $y)
{
    if ($x <= $y) {
        return $x;
    } else {
        return $y;
    }
}

//RUMUS ANGGREGASI MENCARI NILAI MAX DARI RULE
// AGREGASI = MAx(DARI RULE)

//RUMUS AREA

//A1 = NILAI MIN DARI AGREGASI
function area($a1)
{
    return $a1 * (4.5 - 3) + 3;
}

//A2 = NILAI MAX DARI AGREGASI
function area2($a2)
{
    return abs($a2 * (7.5 - 6) - 7.5);
}


function luas1($agmin, $a1)
{
    //AGREGASI MIN * AREA 1
    return $agmin * $a1;
}

function luas2($agmin, $agmax, $a1, $a2)
{

    return abs(0.5 * ($agmin + $agmax) * ($a2 - $a1));
}

function luas3($a2, $agmax)
{
    return (10 - $a2) * $agmax;
}


function momentum1($agmin, $a1)
{
    return 0 + ($agmin * 0.5) * pow($a1, 2);
}

function momentum2($a1, $a2)
{

    $s1 = number_format((0.33 * pow($a2, 3)), 8);
    $s2 = number_format((0.33 * pow($a1, 3)), 8);
    $s3 = number_format((0.5 * pow($a2, 2)), 7);
    $s4 = number_format((0.5 * pow($a1, 2)), 7);
    $h1 = $s1 - $s2;
    $h2 = $s3 - $s4;
    // return 0.67 * number_format((0.33 * pow($a2, 3)), 8) - number_format((0.33 * pow($a1, 3)), 8) - 3 * number_format((0.5 * pow($a2, 2)), 7) - number_format((0.5 * pow($a1, 2)), 7);
    // return number_format((0.33 * pow($a2, 3)), 8); //21.19929904
    // return number_format((0.33 * pow($a1, 3)), 8); //14.08819908 
    // return number_format((0.5 * pow($a2, 2)), 7); //8.02001250 
    // return number_format((0.5 * pow($a1, 2)), 7); // 6.10751250 
    // return $s1 - $s2; //  7.11109996
    // return $s3 - $s4; //1.9125
    return 0.67 * ($h1 - (3 * $h2)); //1.9125
}

function momentum3($a2)
{
    $a1 = (0.5 * pow(10, 2)); //50
    $a2 = (0.5 * pow($a2, 2));
    $h1 = $a1 - $a2;
    return number_format(0.67 * $h1, 7);
    // return $a2;
}

function centroid($m1, $m2, $m3, $l1, $l2, $l3)
{
    $hm = $m1 + $m2 + $m3;
    $hl = $l1 + $l2 + $l3;
    return number_format($hm / $hl, 2) / 10 * 100;
}
