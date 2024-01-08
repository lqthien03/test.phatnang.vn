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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('address');
            $table->string('name');
            $table->string('email');
            $table->string('hotline');
            $table->string('zalo');
            $table->string('phone');
            $table->string('website');
            $table->string('fanpage');
            $table->string('map');
            $table->string('link');
            $table->time('time');
            $table->string('product_number');
            $table->string('related_product_number');
            $table->string('posts');
            $table->string('related_posts');
            $table->string('map_iframe');
            $table->string('google_analytic');
            $table->string('google_webmaster_tool');
            $table->string('head_js');
            $table->string('body_js');
            $table->foreignId('seo_id')->nullable()->constrained('seos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
