<?php

namespace App\Helpers;

class Text
{
    public static function getRoomNumberText(int $number): string
    {
        return match ($number) {
            1 => 'Однокомнатная',
            2 => 'Двухкомнатная',
            3 => 'Трехкомнатная',
            default => '',
        };
    }
}
