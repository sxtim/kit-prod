<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class JkFinishing extends Model
{
    use AsSource, Attachable, Filterable;

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $allowedSorts = [
        'id',
        'sort',
        'created_at',
        'updated_at',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
    ];

    public function jk(): BelongsTo
    {
        return $this->belongsTo(Jk::class);
    }
}
