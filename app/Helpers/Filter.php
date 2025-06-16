<?php

namespace App\Helpers;

use App\Models\Jk;
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

    public static function getApartments(?callable $builderModify = null): array
    {
        $result = [];

        $queryResult = DB::table('houses')
            ->where('active', 1)
            ->groupBy('base_price', 'square', 'address', 'rooms', 'time', 'floor', 'jk_id')
            ->select('base_price', 'square', 'address', 'rooms', 'time', 'floor', 'jk_id');

        if ($builderModify) {
            $builderModify($queryResult);
        }

        $queryResult = $queryResult->get();

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

        if (isset($result['jk_id'])) {
            $result['projects'] = Jk::whereIn('id', $result['jk_id'])->get();
        }

        if (isset($result['square'])) {
            foreach ($result['square'] as &$value) {
                $value = (float) str_replace(',', '.', $value);
            }
        }

        $range = [
            'base_price',
            'square',
            'floor',
        ];

        foreach ($range as $field) {
            if (isset($result[$field])) {
                $minValue = min($result[$field]);
                $maxValue = max($result[$field]);

                $result[$field] = [
                    'min' => $minValue,
                    'max' => $maxValue,
                ];
            }
        }

        if (isset($result['rooms'])) {
            asort($result['rooms']);
        }

        return $result;
    }

    public static function getCommerce(): array
    {
        $result = [];

        $queryResult = DB::table('commerces')
            ->where('active', 1)
            ->groupBy('base_price', 'square', 'address', 'type', 'lease', 'jk_id')
            ->select('base_price', 'square', 'address', 'type', 'lease', 'jk_id')
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

        if ($result['jk_id']) {
            $result['projects'] = Jk::whereIn('id', $result['jk_id'])->get();
        }

        return array_merge($result, self::range($range));
    }
}
