<?php
declare(strict_types=1);

namespace Solutions\Day4;

class FrameX
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

            if ($this->search((int) $x, (int) $y)) {
                $c++;
            }
        }

        return $c;
    }

    public function search(int $x, int $y): bool
    {
        if ($this->letters[$x . '_' . $y] != 'A') {
            return false;
        }

        $countMAS = 0;
        if (! isset($this->letters[($x - 1) . '_' . ($y - 1)]) || ! isset($this->letters[($x + 1) . '_' . ($y + 1)])) {
            return false;
        }

        if (
            ($this->letters[($x - 1) . '_' . ($y - 1)] == 'M' &&  $this->letters[($x + 1) . '_' . ($y + 1)] == 'S')
            ||
            ($this->letters[($x - 1) . '_' . ($y - 1)] == 'S' &&  $this->letters[($x + 1) . '_' . ($y + 1)] == 'M')
            ) {
            $countMAS++;
        }

        if (! isset($this->letters[($x - 1) . '_' . ($y + 1)]) || ! isset($this->letters[($x + 1) . '_' . ($y - 1)])) {
            return false;
        }

        if (
            ($this->letters[($x - 1) . '_' . ($y + 1)] == 'M' &&  $this->letters[($x + 1) . '_' . ($y - 1)] == 'S')
            ||
            ($this->letters[($x - 1) . '_' . ($y + 1)] == 'S' &&  $this->letters[($x + 1) . '_' . ($y - 1)] == 'M')
            ) {
            $countMAS++;
        }

        return $countMAS == 2;
    }
}