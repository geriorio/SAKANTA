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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->decimal('price', 15, 2);
            $table->integer('total_shares')->default(8);
            $table->integer('available_shares')->default(8);
            $table->decimal('price_per_share', 15, 2);
            $table->string('property_type'); // rumah, apartemen, ruko, dll
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('land_area', 8, 2)->nullable(); // luas tanah m2
            $table->decimal('building_area', 8, 2)->nullable(); // luas bangunan m2
            $table->json('images'); // array of image paths
            $table->json('amenities')->nullable(); // fasilitas
            $table->enum('status', ['available', 'fully_owned', 'coming_soon'])->default('available');
            $table->decimal('expected_rental_yield', 5, 2)->nullable(); // % per tahun
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
