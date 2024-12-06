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
    
    public function isSafe(): bool
    {
        $start = $this->data[0];

        $direction = ($this->data[1] > $start) ? self::DIRECTION_UP : self::DIRECTION_DOWN;

        $nbLevels = count($this->data);

        for ($i = 0; $i < $nbLevels - 1; $i++) {
            if (! $this->control($this->data[$i], $this->data[$i + 1], $direction)) {
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