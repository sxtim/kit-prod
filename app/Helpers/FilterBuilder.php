<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class FilterBuilder
{
    private static function prepareRequest(): array
    {
        $request = request();
        $requestFilter = $request->get('data');

        if (!$requestFilter) {
            return [];
        }

        $requestFilter = json_decode($requestFilter, true);

        if ($requestFilter === null) {
            return [];
        }

        foreach ($requestFilter as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $subValue) {
                    if ($subValue === 'any') {
                        unset($requestFilter[$key]);
                    }
                }
            }
        }

        return $requestFilter;
    }

    public static function setApartments(Builder $builder): void
    {
        $requestFilter = self::prepareRequest();

        if (!$requestFilter) {
            return;
        }

        $range = [
            'price' => 'base_price',
            'square' => 'square',
            'floor' => 'floor',
        ];

        foreach ($range as $field => $dbField) {
            if ($requestFilter[$field]) {
                $builder->whereBetween($dbField, [$requestFilter[$field]['min'], $requestFilter[$field]['max']]);
            }
        }

        if (isset($requestFilter['rooms'])) {
            $builder->whereIn('rooms', $requestFilter['rooms']);
        }

        if (isset($requestFilter['address'])) {
            $builder->whereIn('address', $requestFilter['address']);
        }

        if (isset($requestFilter['project'])) {
            $builder->whereIn('jk_id', $requestFilter['project']);
        }

        if (isset($requestFilter['deliveryDate'])) {
            $builder->whereIn('time', $requestFilter['deliveryDate']);
        }
    }

    public static function setCommerce(Builder $builder): void
    {
        $requestFilter = self::prepareRequest();

        if (!$requestFilter) {
            return;
        }

        $range = [
            'commercePrice' => 'base_price',
            'commerceSquare' => 'square',
        ];

        foreach ($range as $field => $dbField) {
            if ($requestFilter[$field]) {
                $builder->whereBetween($dbField, [$requestFilter[$field]['min'], $requestFilter[$field]['max']]);
            }
        }

        if (isset($requestFilter['deliveryDate'])) {
            $builder->whereIn('lease', $requestFilter['deliveryDate']);
        }

        if (isset($requestFilter['address'])) {
            $builder->whereIn('address', $requestFilter['address']);
        }

        if (isset($requestFilter['transactionType'])) {
            foreach ($requestFilter['transactionType'] as $i => $val) {
                if ($i === 0) {
                    $builder->whereJsonContains('type', $val);
                } else {
                    $builder->orWhereJSONContains('type', $val);
                }
            }
        }
    }
}
