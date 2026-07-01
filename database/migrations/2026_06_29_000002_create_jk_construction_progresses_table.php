<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jk_construction_progresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jk_id')->constrained()->cascadeOnDelete();
            $table->boolean('active')->default(true);
            $table->string('type')->default('photo');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->date('report_date')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('sort')->default(0);
            $table->timestamps();

            $table->index(['jk_id', 'active', 'report_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jk_construction_progresses');
    }
};
