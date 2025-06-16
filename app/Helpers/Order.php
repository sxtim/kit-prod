<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class Order
{
    private static function setActiveOrder(array &$orders): ?array
    {
        $request = request();
        $requestOrder = $request->get('order');

        if ( ! $requestOrder) {
            return null;
        }

        foreach ($orders as &$order) {
            if ($order['field'] === $requestOrder) {
                $order['active'] = true;

                return [
                    'field' => $order['field'],
                    'name' => $order['name'],
                ];
            }
        }

        return null;
    }

    public static function getApartments(): array
    {
        $result = [
            [
                'field' => 'price-asc',
                'name' => 'Сначала дешевле',
            ],
            [
                'field' => 'price-desc',
                'name' => 'Сначала дороже',
            ],
//            [
//                'field' => 'date-asc',
//                'name' => 'Срок сдачи (позже)',
//            ],
//            [
//                'field' => 'date-desc',
//                'name' => 'Срок сдачи (раньше)',
//            ],
            [
                'field' => 'square-asc',
                'name' => 'Площадь (больше)',
            ],
            [
                'field' => 'square-desc',
                'name' => 'Площадь (меньше)',
            ],
            [
                'field' => 'floor-asc',
                'name' => 'Этаж (выше)',
            ],
            [
                'field' => 'floor-desc',
                'name' => 'Этаж (ниже)',
            ],
        ];

        $active = self::setActiveOrder($result);

        return [
            'active' => $active,
            'result' => $result,
        ];
    }

    public static function setOrderToBuilderApartments(Builder $builder): void
    {
        $request = request();
        $requestOrder = $request->get('order');

        switch ($requestOrder) {
            case 'price-asc':
                $builder->orderBy(fn ($query) => $query->selectRaw('CASE WHEN sale_price > 0 THEN sale_price ELSE base_price END'));
                break;
            case 'price-desc':
                $builder->orderByDesc(fn ($query) => $query->selectRaw('CASE WHEN sale_price > 0 THEN sale_price ELSE base_price END'));
                break;
            case 'square-asc':
                $builder->orderBy('square');
                break;
            case 'square-desc':
                $builder->orderByDesc('square');
                break;
            case 'floor-asc':
                $builder->orderBy('floor');
                break;
            case 'floor-desc':
                $builder->orderByDesc('floor');
                break;
            default:
                $builder->orderBy('base_price');
        }
    }
}
