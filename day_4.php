<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day4\Frame;

$data = Reader::getDataForDay(4, Reader::DATA);

$frame = new Frame;

foreach ($data as $index => $line) {
    $frame->addLine($index, $line);
}

echo $frame->countAll();