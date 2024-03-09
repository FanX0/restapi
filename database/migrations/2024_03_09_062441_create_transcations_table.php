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
        Schema::disableForeignKeyConstraints();

        Schema::create('transcations', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId('user_id')->constrained();
            $table->integer('gross_amount');
            $table->string('shipping_information');
            $table->string('merchant_id');
            $table->string('payment_method');
            $table->string('status_message');
            $table->string('transaction_id');
            $table->string('transaction_status');
            $table->dateTime('transaction_time');
            $table->dateTime('settlement_time');
            $table->dateTime('expiry_time');
            $table->string('fraud_status');
            $table->integer('order_status');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transcations');
    }
};
