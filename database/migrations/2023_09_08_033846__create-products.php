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
            $table->id('id_product');
            $table->string('name_product')->notNull();
            $table->bigInteger('price_product')->notNull();
            $table->string('slug_product')->default(null)->nullable();
            $table->text('content')->default(null)->nullable()->nullable();
            $table->bigInteger('views_count')->default(0)->nullable();
            $table->bigInteger('count_warehouse')->default(0)->nullable();
            $table->bigInteger('like_count')->default(0)->nullable();
            $table->bigInteger('comment_count')->default(0)->nullable();
            $table->string('feature_image')->default('/storage/uploads/images/products/QsEd3sG9UNk2597dJ17Os5gRXrpXcTtswiuhm7eZ.jpg');
            $table->unsignedBigInteger('id_category')->default(null)->nullable();
            $table->softDeletes();
            $table->foreignId('id_user')->constrained(
                table: 'users',
                indexName: 'products_user_id'
            )->default(null);
            $table->foreign('id_category')->references('id_category')->on('category');
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
