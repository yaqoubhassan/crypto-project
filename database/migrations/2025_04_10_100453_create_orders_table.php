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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('trading_pair_id')->constrained();
            $table->enum('type', ['market', 'limit', 'stop']);
            $table->enum('side', ['buy', 'sell']);
            $table->enum('status', ['open', 'filled', 'partially_filled', 'canceled', 'expired']);
            $table->decimal('price', 24, 8)->nullable(); // For limit orders
            $table->decimal('stop_price', 24, 8)->nullable(); // For stop orders
            $table->decimal('amount', 24, 8);
            $table->decimal('filled_amount', 24, 8)->default(0);
            $table->decimal('fee', 24, 8)->default(0);
            $table->timestamps();

            // Add indexes
            $table->index(['user_id', 'trading_pair_id', 'status']);
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
