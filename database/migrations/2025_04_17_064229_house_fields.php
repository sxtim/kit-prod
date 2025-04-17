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
        Schema::table('houses', function (Blueprint $table) {
            $table->boolean('active');
            $table->string('time')->nullable();
            $table->string('square_kitchen')->nullable();
            $table->unsignedBigInteger('jk_id')->nullable();
            $table->foreign('jk_id')->references('id')->on('jks')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn([
                'active',
                'time',
                'square_kitchen',
            ]);
        });
    }
};
