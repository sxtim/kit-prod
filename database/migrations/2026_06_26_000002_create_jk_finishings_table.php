<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jk_finishings', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->string('title');
            $table->string('img')->nullable();
            $table->string('link')->nullable();
            $table->integer('sort')->default(0);
            $table->unsignedBigInteger('jk_id');
            $table->foreign('jk_id')->references('id')->on('jks')->onDelete('cascade');
            $table->timestamps();
        });

        $finishings = [
            ['title' => 'Прихожая', 'img' => '/assets/img/complex-single/prihozhaya.jpg', 'sort' => 10],
            ['title' => 'Кухня', 'img' => '/assets/img/complex-single/kuhnya.jpg', 'sort' => 20],
            ['title' => 'Спальня', 'img' => '/assets/img/complex-single/gostin.jpg', 'sort' => 30],
            ['title' => 'Санузел', 'img' => '/assets/img/complex-single/vannaya.jpg', 'sort' => 40],
            ['title' => 'Балкон', 'img' => '/assets/img/complex-single/balkon.jpg', 'sort' => 50],
        ];

        $now = now();

        foreach (DB::table('jks')->pluck('id') as $jkId) {
            foreach ($finishings as $finishing) {
                DB::table('jk_finishings')->insert([
                    'active' => true,
                    'title' => $finishing['title'],
                    'img' => $finishing['img'],
                    'link' => null,
                    'sort' => $finishing['sort'],
                    'jk_id' => $jkId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        $this->moveApartmentFinishingLinks($now);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jk_finishings');
    }

    private function moveApartmentFinishingLinks($now): void
    {
        $items = DB::table('apartment_finishings')
            ->join('houses', 'apartment_finishings.house_id', '=', 'houses.id')
            ->where('apartment_finishings.active', true)
            ->whereNotNull('houses.jk_id')
            ->where(function ($query) {
                $query->whereNotNull('apartment_finishings.link')
                    ->orWhereNotNull('apartment_finishings.img');
            })
            ->select([
                'apartment_finishings.title',
                'apartment_finishings.img',
                'apartment_finishings.link',
                'houses.jk_id',
            ])
            ->orderBy('apartment_finishings.sort')
            ->orderBy('apartment_finishings.id')
            ->get();

        foreach ($items as $item) {
            $title = trim((string) $item->title);

            if ($title === '') {
                continue;
            }

            $existing = DB::table('jk_finishings')
                ->where('jk_id', $item->jk_id)
                ->get()
                ->first(function ($finishing) use ($title) {
                    return mb_strtolower(trim($finishing->title)) === mb_strtolower($title);
                });

            if ($existing) {
                DB::table('jk_finishings')
                    ->where('id', $existing->id)
                    ->update([
                        'link' => $item->link,
                        'updated_at' => $now,
                    ]);

                continue;
            }

            $sort = ((int) DB::table('jk_finishings')->where('jk_id', $item->jk_id)->max('sort')) + 10;

            DB::table('jk_finishings')->insert([
                'active' => true,
                'title' => $title,
                'img' => $item->img,
                'link' => $item->link,
                'sort' => $sort,
                'jk_id' => $item->jk_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
};
