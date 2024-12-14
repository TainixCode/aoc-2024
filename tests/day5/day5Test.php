<?php

use Data\Reader;
use Solutions\Day5\Fixer;
use Solutions\Day5\Rules;

test("Respect de l'ordre", function() {

    $rules = new Rules(
        Reader::getDataForDayByPart(5, Reader::SAMPLE, 1)
    );

    $this->assertTrue(
        $rules->checkPositions(
            before: 53,
            after: 29
        )
    );

    $this->assertTrue(
        $rules->checkPositions(
            before: 75,
            after: 47
        )
    );

    $this->assertFalse(
        $rules->checkPositions(
            before: 75,
            after: 97
        )
    );
});


test('Réparation séquence', function() {
    $rules = new Rules(
        Reader::getDataForDayByPart(5, Reader::SAMPLE, 1)
    );

    $fixer = new Fixer($rules);

    $this->assertEquals(
        [97,75,47,61,53],
        $fixer->fix([75,97,47,61,53])
    );
});