<?php

namespace Data;

class Reader
{
    public const SAMPLE = 'sample';
    public const DATA = 'data';

    public static function getDataForDay(int $day, string $filename = self::DATA): array
    {
        $result = [];

        $file = fopen('./data/day' . $day . '/'. $filename .'.txt', 'r');

        while ($line = fgets($file)) {

            $line = trim($line);

            if ($line === '') {
                $line = null;
            }

            $result[] = $line;
        }

        return $result;
    }

    public static function getDataForDayByPart(int $day, string $filename = self::DATA, int $part = 1)
    {
        $result = [];

        $file = fopen('./data/day' . $day . '/'. $filename .'.txt', 'r');

        while ($line = fgets($file)) {

            $line = trim($line);

            if ($line === '') {
                $line = null;
            }

            $result[] = $line;
        }

        $split = array_search(null, $result, true);

        // Fonctionne avec seulement 2 parties pour le moment
        if ($part === 1) {
            return array_slice($result, 0, $split);
        }
        
        return array_slice($result, $split + 1);
    }
}

// $data = Reader::getDataForDay(1);