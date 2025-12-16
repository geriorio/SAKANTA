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
        Schema::table('yachts', function (Blueprint $table) {
            // Change numeric fields to string
            $table->string('shares_committed')->default('0')->change();
            $table->string('length_overall')->change();
            $table->string('beam')->change();
            $table->string('height')->change();
            $table->string('draft')->change();
            $table->string('loaded_displacement')->change();
            $table->string('cruising_speed')->change();
            $table->string('max_speed')->change();
            $table->string('range')->change();
            $table->string('cabins')->change();
            $table->string('berths')->change();
            $table->string('heads')->change();
            $table->string('fuel_capacity')->change();
            $table->string('reserve_fuel_tank')->change();
            $table->string('freshwater_capacity')->change();
            $table->string('holding_tank')->change();
            
            // Make hull_structure and equipment required (not nullable)
            $table->text('hull_structure')->nullable(false)->change();
            $table->text('equipment')->nullable(false)->change();
            $table->text('certifications')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yachts', function (Blueprint $table) {
            // Revert back to numeric
            $table->integer('shares_committed')->default(0)->change();
            $table->decimal('length_overall', 8, 2)->change();
            $table->decimal('beam', 8, 2)->change();
            $table->decimal('height', 8, 2)->change();
            $table->decimal('draft', 8, 2)->change();
            $table->decimal('loaded_displacement', 10, 2)->change();
            $table->decimal('cruising_speed', 8, 2)->change();
            $table->decimal('max_speed', 8, 2)->change();
            $table->decimal('range', 10, 2)->change();
            $table->integer('cabins')->change();
            $table->integer('berths')->change();
            $table->integer('heads')->change();
            $table->decimal('fuel_capacity', 10, 2)->change();
            $table->decimal('reserve_fuel_tank', 10, 2)->change();
            $table->decimal('freshwater_capacity', 10, 2)->change();
            $table->decimal('holding_tank', 10, 2)->change();
            
            // Make nullable again
            $table->text('hull_structure')->nullable()->change();
            $table->text('equipment')->nullable()->change();
            $table->text('certifications')->nullable()->change();
        });
    }
};
