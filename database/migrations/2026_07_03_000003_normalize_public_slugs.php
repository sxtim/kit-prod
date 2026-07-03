<?php

use App\Support\SlugGenerator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $this->fillSlugs('jks', fn ($item) => trim($item->title . ' ' . $item->address));
        $this->fillSlugs('houses', fn ($item) => trim($item->address . ' ' . $item->number));
        $this->fillSlugs('news', fn ($item) => $item->title);
        $this->fillSlugs('sales', fn ($item) => $item->title);
        $this->fillSlugs('commerces', fn ($item) => trim($item->title . ' ' . ($item->number ?: $item->id)));
        $this->fillSlugs('jk_options', fn ($item) => trim($item->title . ' ' . $item->id));
    }

    public function down(): void
    {
        //
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
