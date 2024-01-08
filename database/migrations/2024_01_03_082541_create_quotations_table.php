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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('link');
            $table->decimal('unit_price', 13, 2);
            $table->decimal('wholesale_price', 13, 2);
            $table->string('guarangee');
            $table->boolean('display')->default(false);
            $table->foreignId('quotation_level1_id')->nullable()->constrained('quotation_level1s')->cascadeOnDelete();
            $table->foreignId('seo_id')->nullable()->constrained('seos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
