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
            $table->string('name')->notNull();
            $table->string('slug')->default(null)->nullable();
            $table->text('content')->default(null)->nullable()->nullable();
            $table->bigInteger('views_count')->default(0)->nullable();
            $table->string('feature_image');
            $table->integer('status')->default(0)->nullable();
            $table->json('description_image')->nullable(null);
            $table->unsignedBigInteger('id_category')->nullable();
            $table->softDeletes();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('category')->onDelete('set null');
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
