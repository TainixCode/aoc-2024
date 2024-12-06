<?php
declare(strict_types=1);

namespace Solutions\Day2;

class Report
{
    private const DIRECTION_UP = 'up';
    private const DIRECTION_DOWN = 'down';

    /**
     * @var int[] $data
     */
    private array $data;

    public function __construct(string $data)
    {
        $this->data = array_map('intval', explode(' ', $data));
    }

    public function testEasy(): bool
    {
        return $this->isSafe($this->data);
    }

    public function testDampener(): bool
    {
        if ($this->testEasy()) {
            return true;
        }

        $count = count($this->data);

        for ($i = 0; $i < $count; $i++) {
            
            $data = $this->data;
            unset($data[$i]);
            $data = array_values($data); // Pour remettre les index correctement

            if ($this->isSafe($data)) {
                return true;
            }
        }
        
        return false;
    }
    
    private function isSafe(array $data): bool
    {
        $start = $data[0];

        $direction = ($data[1] > $start) ? self::DIRECTION_UP : self::DIRECTION_DOWN;

        $nbLevels = count($data);

        for ($i = 0; $i < $nbLevels - 1; $i++) {
            if (! $this->control($data[$i], $data[$i + 1], $direction)) {
                return false;
            }
        }

        return true;
    }

    private function control(int $current, int $next, string $direction): bool
    {
        $difference = abs($current - $next);

        if ($difference > 3) {
            return false;
        }

        if ($difference == 0) {
            return false;
        }

        if ($direction === self::DIRECTION_UP) {
            return $next > $current;
        }

        return $next < $current;
    }
}