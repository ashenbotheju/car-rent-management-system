<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id'); // Primary key
            $table->unsignedBigInteger('reservation_id'); // Without foreign key reference to reservations
            $table->enum('payment_method', ['credit_card', 'debit_card', 'bank_transfer']); // Payment method
            $table->decimal('amount', 10, 2); // Payment amount
            $table->string('transaction_id', 100); // Transaction ID
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending'); // Payment status
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
