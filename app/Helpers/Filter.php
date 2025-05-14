<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Filter
{
    private static function range(array $fields): array
    {
        $result = [];

        foreach ($fields as $key => $value) {
            if ($value) {
                $minValue = min($value);
                $maxValue = max($value);

                $result[$key] = [
                    'min' => $minValue,
                    'max' => $maxValue,
                ];
            }
        }

        return $result;
    }

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

    public static function getCommerce(): array
    {
        $result = [];

        $queryResult = DB::table('commerces')
            ->groupBy('base_price', 'square', 'address', 'type', 'lease')
            ->select('base_price', 'square', 'address', 'type', 'lease')
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
            'base_price' => $result['base_price'],
            'square' => $result['square'],
        ];

        if ($result['type']) {
            $values = [];
            foreach ($result['type'] as $json) {
                $value = json_decode($json, true);
                foreach ($value as $val) {
                    $values[] = $val;
                }
            }

            $result['type'] = $values;
        }

        return array_merge($result, self::range($range));
    }
}
