<?php
declare(strict_types=1);

namespace Solutions\Day5;

class Fixer
{
    public function __construct(
        private Rules $rules,
    ) {}

    /**
     * On va retourner la séquence corrigée
     */
    public function fix(array $sequence): array
    {
        // On passe tout en int
        $sequence = array_map('intval', $sequence);

        usort($sequence, function($a, $b) {
            return $this->rules->checkPositionsForUsort($a, $b);
        });

        return $sequence;
    }
}