<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day7\Calculator;

$data = Reader::getDataForDay(7, Reader::DATA);

$sum = 0;
foreach ($data as $equation) {
    $calculator = new Calculator($equation);

    if ($calculator->isPossible()) {
        echo $equation . ' est possible<br />';
        $sum += $calculator->result;
    }
}

echo $sum;