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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('image');
            $table->string('link');
            $table->string('content');
            $table->string('describe');
            $table->boolean('display')->default(false);
            $table->boolean('outstand')->default(false);
            $table->boolean('new')->default(false);
            $table->boolean('selling')->default(false);
            $table->decimal('price', 13, 2);
            $table->decimal('new_price', 13, 2);
            $table->decimal('discount', 13, 2);
            $table->string('code_product');
            $table->foreignId('category_level1_id')->nullable()->constrained('category_level1s')->cascadeOnDelete();
            $table->foreignId('category_level2_id')->nullable()->constrained('category_level2s')->cascadeOnDelete();
            $table->foreignId('category_level3_id')->nullable()->constrained('category_level3s')->cascadeOnDelete();
            $table->foreignId('tag_product_id')->nullable()->constrained('tag_products')->cascadeOnDelete();
            $table->foreignId('seo_id')->nullable()->constrained('seos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
