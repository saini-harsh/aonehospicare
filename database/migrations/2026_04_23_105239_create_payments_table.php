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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('payment_id')->nullable(); // Razorpay Payment ID
            $table->string('razorpay_order_id')->nullable();
            $table->string('payment_method');
            $table->decimal('amount', 15, 2);
            $table->string('currency')->default('INR');
            $table->string('status'); // Pending, Success, Failed, Refunded
            $table->json('raw_response')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
