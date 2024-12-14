<?php
declare(strict_types=1);

namespace Solutions\Day9;

class Disk
{
    private array $data = [];

    public function __construct(string $informations)
    {
        $id = 0;
        $informations = str_split($informations);

        $type = 'file';
        foreach ($informations as $information) {

            if ($type === 'file') {
                
                for ($i = 0; $i < $information; $i++) {
                    $this->data[] = $id;
                }
                
                $id++;
                $type = 'space';
                continue;
            }

            // Type 'space'
            for ($i = 0; $i < $information; $i++) {
                $this->data[] = '.';
            }

            $type = 'file';
        }
    }

    public function fullOptimization(): void
    {
        $count = count($this->data);
        $e = $count - 1;
        $s = 0;
        while ($this->optimize($e, $s)) {

            $e--;
            $s++;

            // A la rencontre on s'arrête
            if ($e === $s) {
                break;
            }
        }
    }

    public function optimize(int $e, int $s): bool
    {
        // On part de la fin (end)
        for ($e; $e >= 0; $e--) {
            if ($this->data[$e] === '.') {
                continue;
            }

            // J'ai trouvé une valeur
            $value = $this->data[$e];
            break;
        }

        // On repart du début (start)
        for ($s; $s < $e; $s++) {
            if ($this->data[$s] === '.') {
                // J'ai trouvé un point, on change
                $this->data[$s] = $value;
                $this->data[$e] = '.';
                return true;
            }
        }

        return false;
    }

    public function calculateChecksum(): int
    {
        $sum = 0;
        foreach ($this->data as $index => $value) {
            if ($value === '.') {
                continue;
            }

            $sum += ($index * $value);
        }

        return $sum;
    }

    public function getStringData(): string
    {
        return implode('', $this->data);
    }
}