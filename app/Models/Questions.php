<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Questions extends Model
{
    use AsSource, Attachable, Filterable;

    protected $guarded = [];

    protected $allowedSorts = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'question' => Like::class,
        'answer' => Like::class,
    ];
}
