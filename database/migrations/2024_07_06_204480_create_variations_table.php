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
        Schema::create('variations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('price', 15)->index();
            $table->decimal('purchase_price', 15);
            $table->integer('quantity')->default(0);
            $table->string('sku')->unique()->index();
            $table->string('model');
            $table->string('ean', 13);
            $table->integer('pis');
            $table->integer('cofins');
            $table->integer('icms');

            $table->foreignUuid('variation_type_id')
                ->references('id')
                ->on('variation_types')
                ->onDelete('cascade');

            $table->foreignUuid('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations');
    }
};
