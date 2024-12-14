<?php
declare(strict_types=1);

namespace Solutions\Day7;

class Calculator
{
    public readonly int $result;
    private array $values;

    public function __construct(string $informations)
    {
        $informations = explode(':', $informations);

        $this->result = (int) $informations[0];
        $this->values = array_map('intval', explode(' ', trim($informations[1])));
    }

    public function addValues(array $values, int $newValue): array
    {
        $result = [];
        foreach ($values as $value) {
            $result[] = $value + $newValue;
            $result[] = $value * $newValue;
        }

        return $result;
    }

    public function isPossible(): bool
    {
        // On commence avec la première
        $values = [$this->values[0]];

        // On l'enlève
        unset($this->values[0]);

        // On boucle sur les valeurs
        foreach ($this->values as $value) {
            $values = $this->addValues($values, $value);
        }

        return in_array($this->result, $values);
    }
}