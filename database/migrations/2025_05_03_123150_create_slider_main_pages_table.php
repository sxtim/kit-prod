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
        Schema::create('slider_main_pages', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->string('heading')->nullable();
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->string('img');
            $table->integer('sort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_main_pages');
    }
};
