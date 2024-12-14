<?php
declare(strict_types=1);

namespace Solutions\Day5;

class Rules
{
    /**
     * @var array $rules
     */
    private array $rules = [];

    public function __construct(array $rules)
    {
        foreach ($rules as $rule) {

            $rule = explode('|', $rule);

            $before = (int) $rule[0];
            $after = (int) $rule[1];

            if (! array_key_exists($before, $this->rules)) {
                $this->rules[$before] = [];
            }
            
            $this->rules[$before][] = $after;
        }
    }

    public function checkPositions(int $before, int $after): bool
    {
        if (array_key_exists($before, $this->rules) && in_array($after, $this->rules[$before])) {
            return true;
        }

        // Dans l'autre sens c'est false
        if (array_key_exists($after, $this->rules) && in_array($before, $this->rules[$after])) {
            return false;
        }

        // Sinon pas de règle donc true
        return true;
    }
}