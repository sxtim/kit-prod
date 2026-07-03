<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SlugGenerator
{
    private const MAP = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'e',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ъ' => '',
        'ы' => 'y',
        'ь' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
    ];

    public static function normalize(string $value): string
    {
        $value = trim(mb_strtolower($value));
        $value = strtr($value, self::MAP);
        $value = preg_replace('/[\/\\\\]+/', '-', $value) ?? $value;
        $slug = Str::slug($value, '-');

        return $slug !== '' ? $slug : 'page';
    }

    public static function unique(Model $model, string $source, string $column = 'slug'): string
    {
        return self::uniqueForTable(
            $model->getTable(),
            $source,
            $model->getKey(),
            $model->getKeyName(),
            $column
        );
    }

    public static function uniqueForTable(
        string $table,
        string $source,
        int|string|null $ignoreId = null,
        string $keyName = 'id',
        string $column = 'slug'
    ): string {
        $base = self::normalize($source);
        $slug = $base;
        $suffix = 2;

        while (self::exists($table, $column, $slug, $ignoreId, $keyName)) {
            $slug = $base . '-' . $suffix;
            $suffix++;
        }

        return $slug;
    }

    private static function exists(
        string $table,
        string $column,
        string $slug,
        int|string|null $ignoreId,
        string $keyName
    ): bool {
        return DB::table($table)
            ->where($column, $slug)
            ->when($ignoreId !== null, fn ($query) => $query->where($keyName, '!=', $ignoreId))
            ->exists();
    }
}
