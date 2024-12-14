<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day6\Map;

$data = Reader::getDataForDay(6, Reader::DATA);

$map = new Map($data);
$map->move();
echo $map->getNbPointsVisited();