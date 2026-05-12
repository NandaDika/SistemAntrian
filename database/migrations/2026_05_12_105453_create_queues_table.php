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
        Schema::create('queues', function (Blueprint $table) {
            $table->id();

            $table->string('queue_number');
            $table->date('queue_date');

            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();

            $table->foreignId('current_department_id')
                ->constrained('departments')
                ->cascadeOnDelete();

            $table->foreignId('current_counter_id')
                ->nullable()
                ->constrained('counters')
                ->nullOnDelete();

            $table->foreignId('registration_user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('status', 30);
            $table->string('priority_type', 20)->default('NORMAL');
            $table->string('source_type', 20)->default('KIOSK');

            $table->timestamp('called_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index('queue_number');
            $table->index('status');
            $table->index('queue_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
