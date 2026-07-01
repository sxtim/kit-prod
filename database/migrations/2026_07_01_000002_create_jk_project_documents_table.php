<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jk_project_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jk_project_document_group_id')->constrained()->cascadeOnDelete();
            $table->boolean('active')->default(true);
            $table->integer('sort')->default(0);
            $table->string('title');
            $table->date('document_date')->nullable();
            $table->timestamps();

            $table->index(['jk_project_document_group_id', 'active', 'sort'], 'jk_project_docs_group_active_sort_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jk_project_documents');
    }
};
