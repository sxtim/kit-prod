<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class House extends Model
{
    use AsSource, Attachable, Filterable;

    protected $guarded = [];

    protected $allowedSorts = [
        'id',
        'active',
        'square',
        'rooms',
        'number',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'square' => Like::class,
        'rooms' => Like::class,
        'number' => Like::class,
        'address' => Like::class,
    ];

    public function jk(): BelongsTo
    {
        return $this->belongsTo(Jk::class);
    }

    public function finishing(): HasMany
    {
        return $this->hasMany(ApartmentFinishing::class);
    }

    public function getSimilar(): Collection|BaseCollection
    {
        if ($this->similar) {
            $similarIds = json_decode($this->similar, true);
            return House::where('id', $similarIds)->get();
        }

        return collect();
    }
}
