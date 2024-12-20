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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Investment name or type
            $table->decimal('amount', 10, 2); // Initial investment amount
            $table->string('category')->after('amount')->nullable(); // Add category columns
            $table->decimal('roi', 10, 2)->nullable(); // Return on investment (ROI)
            $table->decimal('returns', 10, 2)->nullable(); // Actual returns
            $table->decimal('target', 10, 2)->nullable(); // Target return
            $table->string('category'); // Category (e.g., stock, real estate)
            $table->date('investment_date'); // Investment start date
            $table->date('maturity_date')->nullable(); // Maturity or end date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
