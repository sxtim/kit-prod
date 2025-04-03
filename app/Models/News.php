<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class News extends Model
{
    use AsSource, Attachable, Filterable;

    protected $fillable = [
        'title',
        'description',
    ];

    protected $allowedSorts = [
        'id',
        'title',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'description' => Like::class,
    ];
}
