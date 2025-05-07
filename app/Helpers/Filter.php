<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Filter
{
    public static function getApartments(): array
    {
        $result = [];

        $queryResult = DB::table('houses')
            ->groupBy('base_price', 'square', 'address', 'rooms', 'time', 'floor')
            ->select('base_price', 'square', 'address', 'rooms', 'time', 'floor')
            ->get();

        foreach ($queryResult as $values) {
            foreach ($values as $field => $val) {
                if ( ! isset($result[$field])) {
                    $result[$field] = [];
                }

                if ( ! in_array($val, $result[$field])) {
                    $result[$field][] = $val;
                }
            }
        }

        $range = [
            'base_price',
            'square',
            'floor',
        ];

        foreach ($range as $field) {
            if ($result[$field]) {
                $minValue = min($result[$field]);
                $maxValue = max($result[$field]);

                $result[$field] = [
                    'min' => $minValue,
                    'max' => $maxValue,
                ];
            }
        }

        if ($result['rooms']) {
            asort($result['rooms']);
        }

        return $result;
    }
}
