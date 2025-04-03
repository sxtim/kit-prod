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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('square');
            $table->string('houseroom');
            $table->string('position');
            $table->string('floor');
            $table->string('ceiling_height');
            $table->string('view_window');
            $table->decimal('base_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('price_square', 10, 2)->nullable();
            $table->string('description_small')->nullable();
            $table->string('layout_img')->nullable();
            $table->string('size_img')->nullable();
            $table->string('floor_img')->nullable();
            $table->string('gen_plan_img')->nullable();
            $table->unsignedBigInteger('house_id')->nullable();
            $table->foreign('house_id')->references('id')->on('houses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
