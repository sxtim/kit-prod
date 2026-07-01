<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Screen\AsSource;

class JkProjectDocument extends Model
{
    use AsSource, Attachable, Filterable;

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
        'document_date' => 'date',
    ];

    protected $allowedSorts = [
        'id',
        'active',
        'sort',
        'document_date',
        'created_at',
        'updated_at',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(JkProjectDocumentGroup::class, 'jk_project_document_group_id');
    }
}
