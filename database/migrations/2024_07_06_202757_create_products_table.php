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
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->string('ncm', 8);
            $table->string('cest', 7)->nullable();
            $table->integer('warranty')->default(0);
            $table->integer('height');
            $table->integer('width');
            $table->integer('length');
            $table->integer('weight');
            $table->integer('tax_origin')->default(0);
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->boolean('is_active')->default(true);

            $table->foreignUuid('category_id')
                ->nullable()
                ->references('id')
                ->on('categories')
                ->nullOnDelete();

            $table->foreignUuid('brand_id')
                ->nullable()
                ->references('id')
                ->on('brands')
                ->nullOnDelete();

            $table->foreignUuid('unity_type_id')
                ->nullable()
                ->references('id')
                ->on('unity_types')
                ->nullOnDelete();

            $table->softDeletes();
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
