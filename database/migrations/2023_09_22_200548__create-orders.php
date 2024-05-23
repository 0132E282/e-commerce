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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('status')->nullable();
            $table->string('note')->nullable();
            $table->string('fullname', 50);
            $table->json('address');
            $table->string('email', 100)->nullable();
            $table->string('phone', 11)->nullable();

            $table->string('payment', 100)->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->bigInteger('trading_code');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
