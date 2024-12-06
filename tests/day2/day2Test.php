<?php

/**
 * 7 6 4 2 1: Safe without removing any level.
 * 1 2 7 8 9: Unsafe regardless of which level is removed.
 * 9 7 6 2 1: Unsafe regardless of which level is removed.
 * 1 3 2 4 5: Safe by removing the second level, 3.
 * 8 6 4 4 1: Safe by removing the third level, 4.
 * 1 3 6 7 9: Safe without removing any level.
 */

 test('Report 1', function () {
    $report = new Solutions\Day2\Report('7 6 4 2 1');
    $this->assertTrue($report->testDampener());
 });

test('Report 2', function () {
    $report = new Solutions\Day2\Report('1 2 7 8 9');
    $this->assertFalse($report->testDampener());
});

test('Report 3', function () {
    $report = new Solutions\Day2\Report('9 7 6 2 1');
    $this->assertFalse($report->testDampener());
});

test('Report 4', function () {
    $report = new Solutions\Day2\Report('1 3 2 4 5');
    $this->assertTrue($report->testDampener());
});

test('Report 5', function () {
    $report = new Solutions\Day2\Report('8 6 4 4 1');
    $this->assertTrue($report->testDampener());
});

test('Report 6', function () {
    $report = new Solutions\Day2\Report('1 3 6 7 9');
    $this->assertTrue($report->testDampener());
});