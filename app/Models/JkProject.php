<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class JkProject extends Model
{
    use AsSource, Attachable, Filterable;

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $allowedSorts = [
        'id',
        'sort',
        'title',
        'created_at',
        'updated_at',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'sort' => Like::class,
    ];

    public function jks(): HasMany
    {
        return $this->hasMany(Jk::class);
    }
}
