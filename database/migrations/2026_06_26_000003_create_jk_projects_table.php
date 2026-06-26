<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jk_projects', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->integer('sort')->default(0);
            $table->string('title');
            $table->timestamps();
        });

        Schema::table('jks', function (Blueprint $table) {
            $table->unsignedBigInteger('jk_project_id')->nullable()->after('id');
            $table->foreign('jk_project_id')
                ->references('id')
                ->on('jk_projects')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });

        $now = now();

        DB::table('jks')
            ->select('title')
            ->whereNotNull('title')
            ->distinct()
            ->orderBy('title')
            ->pluck('title')
            ->each(function (string $title, int $index) use ($now) {
                $projectId = DB::table('jk_projects')->insertGetId([
                    'active' => true,
                    'sort' => $index + 1,
                    'title' => $title,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

                DB::table('jks')
                    ->where('title', $title)
                    ->update([
                        'jk_project_id' => $projectId,
                        'updated_at' => $now,
                    ]);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jks', function (Blueprint $table) {
            $table->dropForeign(['jk_project_id']);
            $table->dropColumn('jk_project_id');
        });

        Schema::dropIfExists('jk_projects');
    }
};
