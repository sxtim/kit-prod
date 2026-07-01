<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class JkProjectDocumentGroup extends Model
{
    use AsSource, Filterable;

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected $allowedSorts = [
        'id',
        'active',
        'sort',
        'title',
        'created_at',
        'updated_at',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(JkProject::class, 'jk_project_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(JkProjectDocument::class)->orderBy('sort')->orderByDesc('document_date');
    }
}
