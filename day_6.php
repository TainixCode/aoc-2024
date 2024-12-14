<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day6\Map;

$data = Reader::getDataForDay(6, Reader::DATA);

// PART 1 --------------------------------------------
$map = new Map($data);
$map->move();
echo $map->getNbPointsVisited();

// PART 2 --------------------------------------------
echo '<br />';
$pointsVisited = $map->getVisitedPointsXY();

$nbPointsForInfiniteLoop = 0;
foreach ($pointsVisited as $point) {
    $map = new Map($data);
    $map->setObstacle($point[0], $point[1]);

    try {
        $map->move();
    } catch (\Exception $e) {
        $nbPointsForInfiniteLoop++;
    }
}

echo $nbPointsForInfiniteLoop;