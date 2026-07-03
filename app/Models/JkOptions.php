<?php

namespace App\Models;

use App\Models\Concerns\HasPublicSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class JkOptions extends Model
{
    use AsSource, Attachable, Filterable, HasPublicSlug;

    protected $guarded = [];

    protected $allowedSorts = [
        'id',
        'title',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'title' => Like::class,
    ];

    protected $casts = [
        'active' => 'bool',
    ];

    public function jk(): BelongsTo
    {
        return $this->belongsTo(Jk::class);
    }

    public function publicSlugSource(): string
    {
        return trim($this->title . ' ' . $this->getKey());
    }
}
