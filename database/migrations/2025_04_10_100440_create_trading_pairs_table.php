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
        Schema::create('trading_pairs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_currency_id')->constrained('currencies');
            $table->foreignId('quote_currency_id')->constrained('currencies');
            $table->decimal('min_order_size', 24, 8)->default(0);
            $table->decimal('max_order_size', 24, 8)->nullable();
            $table->integer('price_precision')->default(2);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Ensure unique pairs
            $table->unique(['base_currency_id', 'quote_currency_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trading_pairs');
    }
};
