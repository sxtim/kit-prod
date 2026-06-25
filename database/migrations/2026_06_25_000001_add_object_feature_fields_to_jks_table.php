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
            $table->string('object_feature_1_title')->nullable()->after('about_media_img');
            $table->text('object_feature_1_text')->nullable()->after('object_feature_1_title');
            $table->string('object_feature_1_img')->nullable()->after('object_feature_1_text');
            $table->string('object_feature_2_title')->nullable()->after('object_feature_1_img');
            $table->text('object_feature_2_text')->nullable()->after('object_feature_2_title');
            $table->string('object_feature_2_img')->nullable()->after('object_feature_2_text');
            $table->string('object_feature_3_title')->nullable()->after('object_feature_2_img');
            $table->text('object_feature_3_text')->nullable()->after('object_feature_3_title');
            $table->string('object_feature_3_img')->nullable()->after('object_feature_3_text');
            $table->string('object_feature_4_title')->nullable()->after('object_feature_3_img');
            $table->text('object_feature_4_text')->nullable()->after('object_feature_4_title');
            $table->string('object_feature_4_img')->nullable()->after('object_feature_4_text');
            $table->string('object_feature_5_title')->nullable()->after('object_feature_4_img');
            $table->text('object_feature_5_text')->nullable()->after('object_feature_5_title');
            $table->string('object_feature_5_img')->nullable()->after('object_feature_5_text');
        });

        DB::table('jks')->update([
            'object_feature_1_title' => 'Архитектура',
            'object_feature_1_img' => '/assets/img/about-company/company1.jpg',
            'object_feature_2_title' => 'Паркинг',
            'object_feature_2_img' => '/assets/img/parking/parking1.jpg',
            'object_feature_4_title' => 'Материалы',
            'object_feature_4_img' => '/assets/img/complex-single/vannaya.jpg',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jks', function (Blueprint $table) {
            $table->dropColumn([
                'object_feature_1_title',
                'object_feature_1_text',
                'object_feature_1_img',
                'object_feature_2_title',
                'object_feature_2_text',
                'object_feature_2_img',
                'object_feature_3_title',
                'object_feature_3_text',
                'object_feature_3_img',
                'object_feature_4_title',
                'object_feature_4_text',
                'object_feature_4_img',
                'object_feature_5_title',
                'object_feature_5_text',
                'object_feature_5_img',
            ]);
        });
    }
};
