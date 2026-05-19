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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('hospital_address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('gst_amount', 15, 2);
            $table->decimal('total_amount', 15, 2);
            $table->string('payment_method')->default('COD'); // COD or Razorpay
            $table->string('payment_status')->default('Pending');
            $table->string('order_status')->default('New'); // New, Processing, Shipped, Delivered, Cancelled
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
