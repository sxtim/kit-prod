<?php

use App\Support\SlugGenerator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('houses')
            ->leftJoin('jks', 'houses.jk_id', '=', 'jks.id')
            ->orderBy('houses.id')
            ->get([
                'houses.id',
                'houses.address',
                'houses.number',
                'jks.title as jk_title',
            ])
            ->each(function ($item) {
                DB::table('houses')
                    ->where('id', $item->id)
                    ->update([
                        'slug' => SlugGenerator::uniqueForTable(
                            'houses',
                            trim($item->jk_title . ' ' . $item->address . ' ' . $item->number),
                            $item->id
                        ),
                    ]);
            });
    }

    public function down(): void
    {
        DB::table('houses')
            ->orderBy('id')
            ->get(['id', 'address', 'number'])
            ->each(function ($item) {
                DB::table('houses')
                    ->where('id', $item->id)
                    ->update([
                        'slug' => SlugGenerator::uniqueForTable(
                            'houses',
                            trim($item->address . ' ' . $item->number),
                            $item->id
                        ),
                    ]);
            });
    }
};
