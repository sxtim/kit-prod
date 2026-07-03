<?php

namespace App\Models;

use App\Models\Concerns\HasPublicSlug;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class News extends Model
{
    use AsSource, Attachable, Filterable, HasPublicSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'date',
        'active',
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
