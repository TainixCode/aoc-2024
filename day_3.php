<?php

require './vendor/autoload.php';

use Data\Reader;

$data = Reader::getDataForDay(3, Reader::DATA);

$instructions = '';
foreach ($data as $values) {
    $instructions .= $values;
}

// Expression régulière qui récupère dans $data les séquences :
// - mul(x,y) ou x et y sont des entiers
// - do()
// - don't()
$pattern = '/mul\((\d+),(\d+)\)|do\(\)|don\'t\(\)/';

$calculs = [];
preg_match_all($pattern, $instructions, $calculs);

function mul(int $x, int $y): int
{
    return $x * $y;
}

$activate = true;
$sum = 0;
foreach ($calculs[0] as $calcul) {

    if ($calcul === 'do()') {
        $activate = true;
        continue;
    }

    if ($calcul === 'don\'t()') {
        $activate = false;
        continue;
    }

    if (! $activate) {
        continue;
    }

    $sum += eval('return ' . $calcul . ';');
}

echo $sum;