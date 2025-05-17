<?php

namespace App\Traits;

trait Singleton
{
    private static $instance = null;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance(): static
    {
        if (self::$instance === null) {
            self::$instance = new static;
        }

        return self::$instance;
    }
}
