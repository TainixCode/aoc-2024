<?php

require './vendor/autoload.php';

use Data\Reader;
use Solutions\Day5\Fixer;
use Solutions\Day5\Rules;

$rules = new Rules(
    Reader::getDataForDayByPart(5, Reader::DATA, 1)
);

$updates = Reader::getDataForDayByPart(5, Reader::DATA, 2);

// PART 1 --------------------------------------------
$sum = 0;
foreach ($updates as $updateSequence) {

    $updateSequence = explode(',', $updateSequence);

    $sequenceOK = true;

    $stop = count($updateSequence) - 1;

    foreach ($updateSequence as $i => $number) {

        // On ne traite pas le dernier
        if ($i === $stop) {
            break;
        }

        $before = (int) $number;

        foreach (array_slice($updateSequence, $i + 1) as $after) {

            $after = (int) $after;

            if (! $rules->checkPositions($before, $after)) {
                $sequenceOK = false;
                break 2;
            }
        }

    }

    if ($sequenceOK) {
        echo implode(',', $updateSequence) . ' OK ' . '<br />';
        $sum += $updateSequence[$stop / 2];
    }
}

echo $sum;
echo '<br />';
// PART 2 --------------------------------------------
$fixer = new Fixer($rules);
$sum = 0;
foreach ($updates as $updateSequence) {

    $updateSequence = explode(',', $updateSequence);

    $sequenceOK = true;

    $stop = count($updateSequence) - 1;

    foreach ($updateSequence as $i => $number) {

        // On ne traite pas le dernier
        if ($i === $stop) {
            break;
        }

        $before = (int) $number;

        foreach (array_slice($updateSequence, $i + 1) as $after) {

            $after = (int) $after;

            if (! $rules->checkPositions($before, $after)) {
                $sequenceOK = false;
                break 2;
            }
        }

    }

    if (! $sequenceOK) {
        echo implode(',', $updateSequence) . ' KO => ';
        $updateSequence = $fixer->fix($updateSequence);
        echo implode(',', $updateSequence) . '<br />';
        $sum += $updateSequence[$stop / 2];
    }
}

echo $sum;