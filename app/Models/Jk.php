<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Jk extends Model
{
    use AsSource, Attachable, Filterable;

    protected $guarded = [];

    protected $allowedSorts = [
        'id',
        'title',
        'jk_project_id',
        'sort',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'lease' => Like::class,
        'address' => Like::class,
        'sort' => Like::class,
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(JkProject::class, 'jk_project_id');
    }

    public function options(): HasMany
    {
        return $this->hasMany(JkOptions::class);
    }

    public function houses(): HasMany
    {
        return $this->hasMany(House::class);
    }

    public function commerces(): HasMany
    {
        return $this->hasMany(Commerce::class);
    }

    public function finishings(): HasMany
    {
        return $this->hasMany(JkFinishing::class);
    }

    public function getAdminTitleAttribute(): string
    {
        $projectTitle = $this->project?->title ?: $this->title;

        return filled($this->address)
            ? trim($projectTitle . ' - ' . $this->address)
            : $projectTitle;
    }
}
