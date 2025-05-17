<?php

namespace App\Helpers;

class Apartments extends ClickFilter
{
    public function get(): array
    {
        return $this->getAll();
    }
}
