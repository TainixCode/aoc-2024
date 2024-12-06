<?php

require './vendor/autoload.php';

use Data\Reader;

$data = Reader::getDataForDay(3, Reader::DATA);

$instructions = '';
foreach ($data as $values) {
    $instructions .= $values;
}

// Expression régulière qui récupère dans $data les mul(x,y) ou x et y sont des entiers
$pattern = '/mul\((\d+),(\d+)\)/';
$calculs = [];
preg_match_all($pattern, $instructions, $calculs);

function mul(int $x, int $y): int
{
    return $x * $y;
}

$sum = 0;
foreach ($calculs[0] as $calcul) {
    $sum += eval('return ' . $calcul . ';');
}

echo $sum;