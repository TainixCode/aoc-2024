<?php
declare(strict_types=1);

namespace Solutions\Day6;

class Map
{
    private int $guardianX;
    private int $guardianY;
    private string $guardianDirection;

    private array $points = [];

    public function __construct(public array $data)
    {
        foreach ($data as $y => $line) {
            $points = str_split($line);

            foreach ($points as $x => $typeOfPoint) {

                $isVisited = false;
                // Cas du gardien
                if ($typeOfPoint === '>' || $typeOfPoint === '<' || $typeOfPoint === '^' || $typeOfPoint === 'v') {
                    $this->guardianDirection = $typeOfPoint;
                    $this->guardianX = $x;
                    $this->guardianY = $y;
                    $isVisited = true;
                }

                $this->points[$x . '_' . $y] = new Point($typeOfPoint, $isVisited);
            }
        }
    }

    public function move()
    {
        $block = 0;

        while (true) {

            // On prépare le futur point
            $nextX = $this->guardianX;
            $nextY = $this->guardianY;

            // Il faut chercher la prochaine case du guardien
            switch ($this->guardianDirection) {
                case '>':
                    $nextX++;
                    break;
                case '<':
                    $nextX--;
                    break;
                case '^':
                    $nextY--;
                    break;
                case 'v':
                    $nextY++;
                    break;
            }

            // On vérifie si on est toujours dans la map
            if (! array_key_exists($nextX . '_' . $nextY, $this->points)) {
                break;
            }

            // On récupère le point
            $point = $this->points[$nextX . '_' . $nextY];

            // Si c'est un obstacle on change de direction
            if ($point->isObstacle()) {
                switch ($this->guardianDirection) {
                    case '>':
                        $this->guardianDirection = 'v';
                        break;
                    case '<':
                        $this->guardianDirection = '^';
                        break;
                    case '^':
                        $this->guardianDirection = '>';
                        break;
                    case 'v':
                        $this->guardianDirection = '<';
                        break;
                }
                
                continue;
            }


            // On avance
            $this->guardianX = $nextX;
            $this->guardianY = $nextY;
            $point->visit();

            $block++;
            if ($block >= 10000) {
                throw new \Exception('Il tourne en rond');
            }
        }
    }

    public function getNbPointsVisited(): int
    {
        $nb = 0;

        foreach ($this->points as $point) {
            if ($point->isVisited()) {
                $nb++;
            }
        }

        return $nb;
    }

    public function getVisitedPointsXY(): array
    {
        $visited = [];

        foreach ($this->points as $key => $point) {
            if ($point->isVisited()) {
                $visited[] = explode('_', $key);
            }
        }

        return $visited;
    }

    /**
     * Pour la partie 2, je peux définir un point aléatoirement comme un obstacle
     */
    public function setObstacle(int $x, int $y)
    {
        $this->points[$x . '_' . $y]->setObstacle();
    }
}