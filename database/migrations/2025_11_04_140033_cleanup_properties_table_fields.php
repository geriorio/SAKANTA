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
        Schema::table('properties', function (Blueprint $table) {
            // Drop fields that are not needed
            $table->dropColumn([
                'total_shares',
                'available_shares', 
                'price_per_share',
                'property_type',
                'amenities',
                'expected_rental_yield',
                'is_featured'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            // Restore dropped columns
            $table->integer('total_shares')->default(8);
            $table->integer('available_shares')->default(8);
            $table->decimal('price_per_share', 15, 2)->nullable();
            $table->string('property_type')->nullable();
            $table->json('amenities')->nullable();
            $table->decimal('expected_rental_yield', 5, 2)->nullable();
            $table->boolean('is_featured')->default(false);
        });
    }
};
