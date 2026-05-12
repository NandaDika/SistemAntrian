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
            $table->id();

            $table->foreignId('queue_id')->constrained()->cascadeOnDelete();

            $table->string('transaction_number')->unique();

            $table->foreignId('cashier_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->decimal('subtotal', 14, 2)->default(0);
            $table->decimal('discount', 14, 2)->default(0);
            $table->decimal('tax', 14, 2)->default(0);
            $table->decimal('grand_total', 14, 2)->default(0);

            $table->string('payment_status', 30)->default('UNPAID');

            $table->timestamp('paid_at')->nullable();

            $table->text('notes')->nullable();

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
