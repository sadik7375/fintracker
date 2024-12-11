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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->decimal('fine', 10, 2)->nullable();
            $table->string('transaction_no')->unique();
            $table->string('transfer_method');
            $table->timestamps();

            // Foreign key constraint for members table
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
