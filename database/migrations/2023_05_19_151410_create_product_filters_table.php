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
        Schema::create('product_filters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('filter_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('filter_value_id')->constrained()->cascadeOnUpdate();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_filters');
    }
};
