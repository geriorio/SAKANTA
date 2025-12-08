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
        Schema::create('yachts', function (Blueprint $table) {
            $table->id();
            
            // Basic Information
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 15, 2);
            $table->string('ownership');
            $table->integer('shares_committed')->default(0);
            $table->string('brand');
            $table->string('status')->default('available');
            
            // Technical Specifications - Dimensions
            $table->decimal('length_overall', 8, 2); // LOA in meters or feet
            $table->decimal('beam', 8, 2);
            $table->decimal('height', 8, 2);
            $table->decimal('draft', 8, 2);
            $table->decimal('loaded_displacement', 10, 2);
            
            // Performance
            $table->decimal('cruising_speed', 8, 2);
            $table->decimal('max_speed', 8, 2);
            $table->string('main_engine');
            $table->decimal('range', 10, 2); // in nautical miles
            $table->string('stabilizer');
            
            // Construction
            $table->string('hull_material');
            $table->text('hull_structure')->nullable();
            
            // Optional Technical
            $table->string('generator')->nullable();
            $table->string('solar_panels')->nullable();
            
            // Capacity
            $table->integer('maximum_passengers');
            $table->integer('cabins');
            $table->integer('berths');
            $table->integer('heads');
            
            // Tank Specifications
            $table->decimal('fuel_capacity', 10, 2);
            $table->decimal('reserve_fuel_tank', 10, 2);
            $table->decimal('freshwater_capacity', 10, 2);
            $table->decimal('holding_tank', 10, 2);
            
            // Additional Information
            $table->text('equipment')->nullable();
            $table->text('certifications')->nullable();
            
            // Images
            $table->string('main_image')->nullable();
            $table->json('gallery_images')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yachts');
    }
};
