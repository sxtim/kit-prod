<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class ApartmentFinishing extends Model
{
    use AsSource, Attachable, Filterable;

    protected $guarded = [];

    protected $allowedSorts = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'abstract_title' => Like::class,
    ];
}
