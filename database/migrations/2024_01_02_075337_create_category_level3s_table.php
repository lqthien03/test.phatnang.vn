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
        Schema::create('category_level3s', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('image');
            $table->boolean('display');
            $table->foreignId('category_level1_id')->nullable()->constrained('category_level1s')->cascadeOnDelete();
            $table->foreignId('category_level2_id')->nullable()->constrained('category_level2s')->cascadeOnDelete();
            $table->foreignId('seo_id')->nullable()->constrained('seos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_level3s');
    }
};
