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
            $table->string('construction_feature_title')->nullable()->after('object_feature_5_img');
            $table->string('construction_feature_img')->nullable()->after('construction_feature_title');
            $table->string('construction_feature_1_title')->nullable()->after('construction_feature_img');
            $table->text('construction_feature_1_text')->nullable()->after('construction_feature_1_title');
            $table->string('construction_feature_2_title')->nullable()->after('construction_feature_1_text');
            $table->text('construction_feature_2_text')->nullable()->after('construction_feature_2_title');
            $table->string('construction_feature_3_title')->nullable()->after('construction_feature_2_text');
            $table->text('construction_feature_3_text')->nullable()->after('construction_feature_3_title');
            $table->string('construction_feature_4_title')->nullable()->after('construction_feature_3_text');
            $table->text('construction_feature_4_text')->nullable()->after('construction_feature_4_title');
        });

        DB::table('jks')->update([
            'construction_feature_title' => 'УНИКАЛЬНОСТЬ СТРОИТЕЛЬСТВА',
            'construction_feature_img' => '/assets/img/complex-single/room.png',
            'construction_feature_1_title' => 'Просторные планировки с гардеробными',
            'construction_feature_1_text' => 'места для хранения в спальнях и коридоре',
            'construction_feature_2_title' => '100% отделка',
            'construction_feature_2_text' => 'отделка современными материалами: линолеум, флизелиновые обои, межкомнатные двери, натяжные потолки',
            'construction_feature_3_title' => 'Просторные дворы',
            'construction_feature_3_text' => 'много прогулочных зон, красивый вид с последних этажей',
            'construction_feature_4_title' => 'Технология из газобетонных блоков',
            'construction_feature_4_text' => 'хорошая вентиляция, высокая теплоизоляция',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jks', function (Blueprint $table) {
            $table->dropColumn([
                'construction_feature_title',
                'construction_feature_img',
                'construction_feature_1_title',
                'construction_feature_1_text',
                'construction_feature_2_title',
                'construction_feature_2_text',
                'construction_feature_3_title',
                'construction_feature_3_text',
                'construction_feature_4_title',
                'construction_feature_4_text',
            ]);
        });
    }
};
