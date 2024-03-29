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
        Schema::create('support_customers', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->boolean('display')->default(false);
            $table->string('phone');
            $table->string('zalo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_customers');
    }
};
