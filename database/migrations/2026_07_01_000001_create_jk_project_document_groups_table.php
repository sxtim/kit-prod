<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jk_project_document_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jk_project_id')->constrained()->cascadeOnDelete();
            $table->boolean('active')->default(true);
            $table->integer('sort')->default(0);
            $table->string('title');
            $table->timestamps();

            $table->index(['jk_project_id', 'active', 'sort']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jk_project_document_groups');
    }
};
