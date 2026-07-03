<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jks', function (Blueprint $table) {
            $table->string('brand_logo')->nullable()->after('preview_img');
            $table->string('brand_phone')->nullable()->after('brand_logo');
            $table->string('brand_email')->nullable()->after('brand_phone');
        });
    }

    public function down(): void
    {
        Schema::table('jks', function (Blueprint $table) {
            $table->dropColumn([
                'brand_logo',
                'brand_phone',
                'brand_email',
            ]);
        });
    }
};
