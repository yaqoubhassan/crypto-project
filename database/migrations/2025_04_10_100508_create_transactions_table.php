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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('wallet_id')->constrained();
            $table->foreignId('currency_id')->constrained();
            $table->enum('type', ['deposit', 'withdrawal', 'transfer']);
            $table->decimal('amount', 24, 8);
            $table->decimal('fee', 24, 8)->default(0);
            $table->enum('status', ['pending', 'completed', 'failed', 'canceled']);
            $table->string('txid')->nullable(); // Blockchain transaction ID
            $table->string('address')->nullable(); // Source/destination address
            $table->timestamps();

            // Add indexes
            $table->index(['user_id', 'wallet_id', 'status']);
            $table->index('txid');
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
