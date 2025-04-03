<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class House extends Model
{
    use AsSource, Attachable, Filterable;

    protected $guarded = [];

    protected $allowedSorts = [
        'id',
        'rooms',
        'number',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'rooms' => Like::class,
        'number' => Like::class,
    ];
}
