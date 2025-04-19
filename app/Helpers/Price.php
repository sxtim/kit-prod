<?php

namespace App\Helpers;

class Price
{
    public static function getBaseFormat($price): string
    {
        return number_format((int) $price, 0, '.', ' ');
    }
}