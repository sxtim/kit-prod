<?php

namespace App\Models\Concerns;

use App\Support\SlugGenerator;
use Illuminate\Database\Eloquent\Model;

trait HasPublicSlug
{
    protected static function bootHasPublicSlug(): void
    {
        static::saving(function (Model $model) {
            if ($model->isDirty('slug') && filled($model->slug)) {
                $model->slug = SlugGenerator::unique($model, (string) $model->slug);
            }
        });

        static::saved(function (Model $model) {
            if (blank($model->slug)) {
                $model->forceFill([
                    'slug' => SlugGenerator::unique($model, $model->publicSlugSource()),
                ])->saveQuietly();
            }
        });
    }

    public function publicSlugSource(): string
    {
        foreach (['title', 'name', 'number'] as $field) {
            if (filled($this->{$field} ?? null)) {
                return (string) $this->{$field};
            }
        }

        return 'page ' . ($this->getKey() ?: uniqid());
    }
}
