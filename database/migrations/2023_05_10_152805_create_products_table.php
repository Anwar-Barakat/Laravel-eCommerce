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
            $table->foreignId('section_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('brand_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('admin_id')->nullable()->constrained()->cascadeOnUpdate();

            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->float('price', 10, 2);
            $table->boolean('discount_type')->default(0);
            $table->float('discount_value', 10, 2)->default(0);
            $table->float('gst', 10, 2)->default(0);
            $table->float('weight', 10, 2)->default(0);
            $table->longText('description');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_best_seller')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
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
