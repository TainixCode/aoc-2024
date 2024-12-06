<?php
declare(strict_types=1);

namespace Solutions\Day4;

class Frame
{
    /**
     * @var array<string, string> $letters
     */
    private array $letters;

    public function addLine(int $index, string $line): void
    {
        $letters = str_split($line);
        foreach ($letters as $key => $letter) {
            $this->letters[$key . '_' . $index] = $letter;
        }
    }

    public function countAll(): int
    {
        $c = 0;

        foreach ($this->letters as $index => $letter) {
            [$x, $y] = explode('_', $index);

            $c += $this->search((int) $x, (int) $y);
        }

        return $c;
    }

    public function search(int $x, int $y): int
    {
        if ($this->letters[$x . '_' . $y] != 'X') {
            return 0;
        }

        $c = 0;

        if ($this->searchRight($x, $y)) {
            $c++;
        }

        if ($this->searchLeft($x, $y)) {
            $c++;
        }

        if ($this->searchUp($x, $y)) {
            $c++;
        }

        if ($this->searchDown($x, $y)) {
            $c++;
        }

        if ($this->searchUpRight($x, $y)) {
            $c++;
        }

        if ($this->searchUpLeft($x, $y)) {
            $c++;
        }

        if ($this->searchDownRight($x, $y)) {
            $c++;
        }

        if ($this->searchDownLeft($x, $y)) {
            $c++;
        }

        return $c;
    }

    private function searchRight(int $x, int $y): bool
    {
        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'M') {
            return false;
        }

        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'S') {
            return false;
        }

        return true;
    }

    private function searchLeft(int $x, int $y): bool
    {
        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'M') {
            return false;
        }

        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'S') {
            return false;
        }

        return true;
    }

    private function searchUp(int $x, int $y): bool
    {
        $y--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'M') {
            return false;
        }

        $y--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $y--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'S') {
            return false;
        }

        return true;
    }

    private function searchDown(int $x, int $y): bool
    {
        $y++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'M') {
            return false;
        }

        $y++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $y++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'S') {
            return false;
        }

        return true;
    }

    private function searchUpRight(int $x, int $y): bool
    {
        $y--;
        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'M') {
            return false;
        }

        $y--;
        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $y--;
        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'S') {
            return false;
        }

        return true;
    }

    private function searchUpLeft(int $x, int $y): bool
    {
        $y--;
        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'M') {
            return false;
        }

        $y--;
        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $y--;
        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'S') {
            return false;
        }

        return true;
    }

    private function searchDownRight(int $x, int $y): bool
    {
        $y++;
        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'M') {
            return false;
        }

        $y++;
        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $y++;
        $x++;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'S') {
            return false;
        }

        return true;
    }

    private function searchDownLeft(int $x, int $y): bool
    {
        $y++;
        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'M') {
            return false;
        }

        $y++;
        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $y++;
        $x--;
        if (! isset($this->letters[$x . '_' . $y]) || $this->letters[$x . '_' . $y] != 'S') {
            return false;
        }

        return true;
    }
}