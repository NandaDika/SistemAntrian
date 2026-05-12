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
        Schema::create('queue_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('queue_id')->constrained()->cascadeOnDelete();

            $table->foreignId('from_department_id')
                ->nullable()
                ->constrained('departments')
                ->nullOnDelete();

            $table->foreignId('to_department_id')
                ->nullable()
                ->constrained('departments')
                ->nullOnDelete();

            $table->foreignId('handled_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('action', 50);

            $table->text('notes')->nullable();
            $table->json('metadata')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queue_histories');
    }
};
