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
        Schema::create('fine_rules', function (Blueprint $table) {
            $table->id();
            $table->decimal('fixed_fine', 10, 2)->default(10.00); // Fixed fine amount
            $table->decimal('percentage_fine', 5, 2)->default(2.00); // Percentage fine per day
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fine_rules');
    }
};
