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
        Schema::create('jk_options', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->unsignedBigInteger('jk_id')->nullable();
            $table->foreign('jk_id')->references('id')->on('jks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jk_options');
    }
};
