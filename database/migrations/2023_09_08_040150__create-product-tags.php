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
        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tag');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('products');
            $table->foreign('id_tag')->references('id_tag')->on('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product-tags');
    }
};
