<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as BaseCollection;

class Commerce extends Model
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
    ];

    public function jk(): BelongsTo
    {
        return $this->belongsTo(Jk::class);
    }

    public function getSimilar(): Collection|BaseCollection
    {
        if ($this->similar) {
            $similarIds = json_decode($this->similar, true);
            return Commerce::where('id', $similarIds)->get();
        }

        return collect();
    }
}
