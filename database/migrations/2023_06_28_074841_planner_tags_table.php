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
        Schema::create('planner_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planner_id')->index()->nullable()->constrained('planners');
            $table->foreignId('tag_id')->index()->nullable()->constrained('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planner_tags');
    }
};
