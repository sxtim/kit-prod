<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class JkConstructionProgress extends Model
{
    use AsSource, Attachable, Filterable;

    protected $table = 'jk_construction_progresses';

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
        'report_date' => 'date',
    ];

    protected $allowedSorts = [
        'id',
        'active',
        'report_date',
        'sort',
        'created_at',
        'updated_at',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'type' => Like::class,
    ];

    public function jk(): BelongsTo
    {
        return $this->belongsTo(Jk::class);
    }
}
