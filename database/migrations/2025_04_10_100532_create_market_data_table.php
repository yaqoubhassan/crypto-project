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
        Schema::create('market_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trading_pair_id')->constrained();
            $table->decimal('open', 24, 8);
            $table->decimal('high', 24, 8);
            $table->decimal('low', 24, 8);
            $table->decimal('close', 24, 8);
            $table->decimal('volume', 24, 8);
            $table->timestamp('timestamp');
            $table->timestamps();

            // Add indexes
            $table->index(['trading_pair_id', 'timestamp']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_data');
    }
};
