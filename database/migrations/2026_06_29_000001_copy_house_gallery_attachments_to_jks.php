<?php

use App\Models\House;
use App\Models\Jk;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $jkIds = DB::table('houses')
            ->whereNotNull('jk_id')
            ->distinct()
            ->pluck('jk_id');

        foreach ($jkIds as $jkId) {
            if ($this->hasJkGallery((int) $jkId)) {
                continue;
            }

            $houseId = $this->firstHouseWithGallery((int) $jkId);

            if ($houseId === null) {
                continue;
            }

            $attachmentIds = DB::table('attachmentable')
                ->where('attachmentable_type', House::class)
                ->where('attachmentable_id', $houseId)
                ->orderBy('id')
                ->pluck('attachment_id');

            foreach ($attachmentIds as $attachmentId) {
                DB::table('attachmentable')->insert([
                    'attachmentable_type' => Jk::class,
                    'attachmentable_id' => $jkId,
                    'attachment_id' => $attachmentId,
                ]);
            }
        }
    }

    public function down(): void
    {
        // Data is intentionally kept: attachments may be edited in the ЖК admin after migration.
    }

    private function hasJkGallery(int $jkId): bool
    {
        return DB::table('attachmentable')
            ->where('attachmentable_type', Jk::class)
            ->where('attachmentable_id', $jkId)
            ->exists();
    }

    private function firstHouseWithGallery(int $jkId): ?int
    {
        return DB::table('houses')
            ->join('attachmentable', function ($join) {
                $join->on('houses.id', '=', 'attachmentable.attachmentable_id')
                    ->where('attachmentable.attachmentable_type', House::class);
            })
            ->where('houses.jk_id', $jkId)
            ->orderBy('houses.id')
            ->value('houses.id');
    }
};
