<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jks', function (Blueprint $table) {
            $table->string('title');
            $table->string('lease');
            $table->string('layout');
            $table->string('video')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('credit_price', 10, 2);
            $table->string('preview_img')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jks', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'lease',
                'layout',
                'video',
                'price',
                'credit_price',
                'preview_img',
                'description',
                'active',
            ]);
        });
    }
};
