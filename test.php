<?php


$x = 4.2;
$y = 5;

echo "Ringan : " . AnggotaRingan($x);
echo "\n\r";
echo "Parah : " . AnggotaParah($x);
echo "\n\r";
echo "Sangat Parah : " . AnggotaSangatParah($x);
// echo "\n\r";
// echo findMin(AnggotaRingan($x), AnggotaRingan($y));
// echo "\n\r";
// echo findMin(AnggotaRingan($x), AnggotaParah($y));



//RUMUS ANGGOTA
function AnggotaRingan($x)
{
    if ($x <= 3) {
        return 1;
    } elseif ($x <= 4.5 && $x > 3) {
        return (4.5 - $x) / (4.5 - 3);
    } else {
        return 0;
    }
}

function AnggotaParah($x)
{
    if ($x <= 3 || $x >= 7.5) {
        return 0;
    } elseif (3 <= $x && $x <= 4.5) {
        return ($x - 3) / (4.5 - 3);
    } elseif (4.5 <= $x && $x <= 6) {
        return 1;
    } elseif (6 <= $x && $x <= 7.5) {
        return (7.5 - $x) / (7.5 - 6);
    }
}

function AnggotaSangatParah($x)
{
    if ($x <= 6) {
        return 0;
    } elseif (6 <= $x && $x <= 7.5) {
        return ($x - 6) / (7.5 - 6);
    } elseif ($x >= 7.5) {
        return 1;
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
function area1($a1)
{
    return $a1 * (4.5 - 3) + 3;
}

//A2 = NILAI MAX DARI AGREGASI
function area2($a2)
{
    return abs($a2 * (7.5 - 6) - 7.5);
}

// echo area1("0.33");
// echo "\n\r";
// echo area2("0.66");


//Menentukan LUAS

function luas1($minrule, $a1)
{
    // (MIN) RULE * A1 
    return $minrule * $a1;
}

function luas2($minrule, $maxrule, $a1, $a2)
{
    // 1/2 (MAXRULE + MINRULE ) ()
    return 0.5 * ($minrule + $maxrule) * ($a1 - $a2);
}

// function luas3($a2,)
// {
// }

// for ($i = 0; $i < 10; $i++) {
//     $data = ["Ringan", "Parah", "Sangat Parah"];
//     foreach ($data as $d) {
//         echo $d;
//         echo "===============";
//         echo "\n\r";
//     }
// }