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
        Schema::create('microsites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique('index-product-slug');
            $table->string('image')->nullable()->default(null);
            $table->integer('expire_time');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('microsite_type_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microsites');
    }
};
