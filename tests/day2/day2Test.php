<?php

test('Report Safe', function () {
    $report = new \Solutions\Day2\Report('7 6 4 2 1');

    $this->assertTrue($report->isSafe());
});

test('Report not Safe', function () {
    $report = new \Solutions\Day2\Report('1 2 7 8 9');

    $this->assertFalse($report->isSafe());
});