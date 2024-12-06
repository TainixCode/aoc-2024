<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day4\Frame;
use Solutions\Day4\FrameX;

$data = Reader::getDataForDay(4, Reader::DATA);

$frame = new FrameX;

foreach ($data as $index => $line) {
    $frame->addLine($index, $line);
}

echo $frame->countAll();