<?php

use App\Support\SlugGenerator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('houses')
            ->orderBy('id')
            ->get()
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

    public function down(): void
    {
        //
    }
};
