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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('order_type_id')->constrained('order_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('payment_type_id')->constrained('payment_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade')->onUpdate('cascade');
            $table->date('delivery_date');
            $table->time('delivery_time');
            $table->string('note')->nullable();
            $table->integer('total_payment');
            // s = success
            // c = cancel
            // p = pending
            $table->enum('status_payment',['S','C','P']);
            $table->string('proof_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
