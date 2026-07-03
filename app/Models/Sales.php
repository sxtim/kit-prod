<?php

namespace App\Models;

use App\Models\Concerns\HasPublicSlug;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Sales extends Model
{
    use AsSource, Attachable, Filterable, HasPublicSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'sale_end',
        'sort',
    ];

    protected $allowedSorts = [
        'id',
        'title',
        'created_at',
        'updated_at',
        'sort',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'description' => Like::class,
    ];
}
