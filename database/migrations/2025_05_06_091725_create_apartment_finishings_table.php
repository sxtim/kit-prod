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
        Schema::create('apartment_finishings', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->string('title');
            $table->string('abstract_title');
            $table->string('img')->nullable();
            $table->string('link')->nullable();
            $table->integer('sort');
            $table->unsignedBigInteger('house_id')->nullable();
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment_finishings');
    }
};
