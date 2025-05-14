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
        Schema::create('commerces', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->string('title');
            $table->string('address');
            $table->json('type')->nullable();
            $table->string('number')->nullable();
            $table->string('square');
            $table->string('lease')->nullable();
            $table->string('floor')->nullable();
            $table->decimal('base_price', 10, 2);
            $table->json('similar')->nullable();
            $table->unsignedBigInteger('jk_id')->nullable();
            $table->foreign('jk_id')->references('id')->on('jks')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commerces');
    }
};
