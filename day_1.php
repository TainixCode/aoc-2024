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

$similarities = array_count_values($listRight);

$sum = 0;
foreach ($listLeft as $key => $value) {
    $sum += $value * ($similarities[$value] ?? 0);
}

echo $sum;