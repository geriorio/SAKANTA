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
        Schema::create('property_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('shares_owned'); // jumlah saham yang dimiliki
            $table->decimal('purchase_price', 15, 2); // harga pembelian per saham
            $table->timestamp('purchased_at');
            $table->enum('status', ['active', 'pending', 'cancelled'])->default('pending');
            $table->timestamps();
            
            $table->unique(['property_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_shares');
    }
};
