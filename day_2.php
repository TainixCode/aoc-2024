<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day2\Report;

$data = Reader::getDataForDay(2, Reader::DATA);

$safes = 0;

foreach ($data as $values) {
    $report = new Report($values);
    $safes += (int) $report->isSafe();
}

echo $safes;