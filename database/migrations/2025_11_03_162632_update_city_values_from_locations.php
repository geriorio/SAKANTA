<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update city column with location name from locations table
        DB::statement('
            UPDATE properties 
            INNER JOIN locations ON properties.location_id = locations.id 
            SET properties.city = locations.name
            WHERE properties.location_id IS NOT NULL
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No rollback needed as this is data update
    }
};
