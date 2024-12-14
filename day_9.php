<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day9\Disk;

$data = Reader::getDataForDay(9, Reader::DATA);


$disk = new Disk($data[0]);
// echo $disk->getStringData() . '<br />';
$disk->fullOptimization();
// echo $disk->getStringData() . '<br />';

echo $disk->calculateChecksum();