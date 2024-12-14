<?php
declare(strict_types=1);

namespace Solutions\Day6;

class Point
{
    private bool $isVisited = false;
    private bool $isObstacle = false;

    public function __construct(string $type, bool $isVisited = false)
    {
        if ($type === '#') {
            $this->isObstacle = true;
        }

        $this->isVisited = $isVisited;
    }

    public function visit(): void
    {
        $this->isVisited = true;
    }

    public function isVisited(): bool
    {
        return $this->isVisited;
    }

    public function isObstacle(): bool
    {
        return $this->isObstacle;
    }
}