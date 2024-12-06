<?php

require './vendor/autoload.php';

use Data\Reader;

$data = Reader::getDataForDay(1, Reader::DATA);

$listLeft = [];
$listRight = [];

foreach ($data as $values) {
    $values = explode('   ', $values);
    $listLeft[] = (int) $values[0];
    $listRight[] = (int) $values[1];
}

sort($listLeft);
sort($listRight);

$sum = 0;
foreach ($listLeft as $key => $value) {
    $sum += abs($value - $listRight[$key]);
}

echo $sum;