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
        Schema::create('sold_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending');
            $table->string('payment_method')->default('cash');
            $table->string('payment_status')->default('pending');

            /*
            $table->string('shipping_status')->default('pending');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('notes')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_charge')->nullable();
            */

            /**
            $table->string('coupon_code')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('coupon_amount')->nullable();
            $table->string('coupon_type')->nullable();
            $table->string('coupon_id')->nullable();
            $table->string('coupon_status')->nullable();
            $table->string('coupon_start_date')->nullable();
            $table->string('coupon_end_date')->nullable();
            $table->string('coupon_total_amount')->nullable();
            $table->string('coupon_total_used')->nullable();
            $table->string('coupon_total_limit')->nullable();
            $table->string('coupon_used_by')->nullable();
            $table->string('coupon_used_by_id')->nullable();
            $table->string('coupon_used_by_type')->nullable();
            $table->string('coupon_used_by_name')->nullable();
            $table->string('coupon_used_by_email')->nullable();
            $table->string('coupon_used_by_phone')->nullable();
            $table->string('coupon_used_by_address')->nullable();
            $table->string('coupon_used_by_notes')->nullable();
            $table->string('coupon_used_by_transaction_id')->nullable();
            $table->string('coupon_used_by_shipping_method')->nullable();
            $table->string('coupon_used_by_shipping_charge')->nullable();
            */

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_products');
    }
};
