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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->enum('type', ['crypto', 'fiat']);
            $table->string('logo')->nullable();
            $table->boolean('is_active')->default(true);
            $table->decimal('withdrawal_fee', 18, 8)->default(0);
            $table->decimal('min_withdrawal', 18, 8)->default(0);
            $table->integer('decimal_places')->default(8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
