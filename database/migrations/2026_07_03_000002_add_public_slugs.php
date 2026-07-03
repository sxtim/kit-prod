<?php

use App\Support\SlugGenerator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const TABLES = [
        'jks',
        'houses',
        'news',
        'sales',
        'commerces',
        'jk_options',
    ];

    public function up(): void
    {
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('slug')->nullable()->after('id');
            });
        }

        $this->fillSlugs('jks', fn ($item) => trim($item->title . ' ' . $item->address));
        $this->fillSlugs('houses', fn ($item) => trim($item->address . ' ' . $item->number));
        $this->fillSlugs('news', fn ($item) => $item->title);
        $this->fillSlugs('sales', fn ($item) => $item->title);
        $this->fillSlugs('commerces', fn ($item) => trim($item->title . ' ' . ($item->number ?: $item->id)));
        $this->fillSlugs('jk_options', fn ($item) => trim($item->title . ' ' . $item->id));

        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->unique('slug');
            });
        }
    }

    public function down(): void
    {
        foreach (array_reverse(self::TABLES) as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropUnique(['slug']);
                $table->dropColumn('slug');
            });
        }
    }

    private function fillSlugs(string $table, callable $source): void
    {
        DB::table($table)
            ->orderBy('id')
            ->get()
            ->each(function ($item) use ($table, $source) {
                DB::table($table)
                    ->where('id', $item->id)
                    ->update([
                        'slug' => SlugGenerator::uniqueForTable($table, (string) $source($item), $item->id),
                    ]);
            });
    }
};
