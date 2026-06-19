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
        Schema::table('jks', function (Blueprint $table) {
            $table->string('detail_img')->nullable()->after('preview_img');
            $table->string('hero_feature_1_title')->nullable()->after('sort');
            $table->string('hero_feature_1_text')->nullable()->after('hero_feature_1_title');
            $table->string('hero_feature_2_title')->nullable()->after('hero_feature_1_text');
            $table->string('hero_feature_2_text')->nullable()->after('hero_feature_2_title');
            $table->string('hero_feature_3_title')->nullable()->after('hero_feature_2_text');
            $table->string('hero_feature_3_text')->nullable()->after('hero_feature_3_title');
            $table->string('hero_feature_4_title')->nullable()->after('hero_feature_3_text');
            $table->string('hero_feature_4_text')->nullable()->after('hero_feature_4_title');
        });

        DB::table('jks')->update([
            'detail_img' => '/assets/img/complexes/zhk-sputnik.jpg',
            'hero_feature_1_title' => 'УК Орбита',
            'hero_feature_1_text' => 'Собственная УК',
            'hero_feature_2_title' => 'Энергоэффективность',
            'hero_feature_2_text' => 'Высокая теплоизоляция',
            'hero_feature_3_title' => 'Планировки',
            'hero_feature_3_text' => 'Удобные и продуманные',
            'hero_feature_4_title' => 'Экологичность',
            'hero_feature_4_text' => 'Строительных материалов',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jks', function (Blueprint $table) {
            $table->dropColumn([
                'detail_img',
                'hero_feature_1_title',
                'hero_feature_1_text',
                'hero_feature_2_title',
                'hero_feature_2_text',
                'hero_feature_3_title',
                'hero_feature_3_text',
                'hero_feature_4_title',
                'hero_feature_4_text',
            ]);
        });
    }
};
