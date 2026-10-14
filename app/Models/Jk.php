<?php

namespace App\Models;

use App\Models\Concerns\HasPublicSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Jk extends Model
{
    use AsSource, Attachable, Filterable, HasPublicSlug;

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

    public function constructionProgress(): HasMany
    {
        return $this->hasMany(JkConstructionProgress::class);
    }

    public function getAdminTitleAttribute(): string
    {
        $projectTitle = $this->project?->title ?: $this->title;

        return filled($this->address)
            ? trim($projectTitle . ' - ' . $this->address)
            : $projectTitle;
    }

    public function getPublicTitleAttribute(): string
    {
        if (blank($this->address) || str_contains(mb_strtolower($this->title), mb_strtolower($this->address))) {
            return $this->title;
        }

        return trim($this->title . ' ' . $this->address);
    }

    public function publicSlugSource(): string
    {
        return $this->public_title;
    }

    public function getMapEmbedUrlAttribute(): ?string
    {
        $map = trim((string) $this->map);

        if ($map === '') {
            return null;
        }

        $parts = parse_url($map);

        if ($parts === false) {
            return $map;
        }

        $host = strtolower($parts['host'] ?? '');
        $path = rtrim($parts['path'] ?? '', '/');

        if (! in_array($host, ['yandex.ru', 'www.yandex.ru', 'yandex.eu', 'www.yandex.eu'], true)
            || ! in_array($path, ['/maps', '/map-widget/v1'], true)
            || empty($parts['query'])) {
            return $map;
        }

        parse_str($parts['query'], $query);

        if (! isset($query['um']) || ! str_starts_with((string) $query['um'], 'constructor:')) {
            return $map;
        }

        $widgetQuery = [
            'um' => $query['um'],
            'source' => 'constructor',
        ];

        foreach (['lang', 'scroll', 'll', 'z'] as $key) {
            if (isset($query[$key])) {
                $widgetQuery[$key] = $query[$key];
            }
        }

        return 'https://yandex.ru/map-widget/v1/?' . http_build_query(
            $widgetQuery,
            '',
            '&',
            PHP_QUERY_RFC3986
        );
    }
}
