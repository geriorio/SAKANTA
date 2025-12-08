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
        Schema::table('yachts', function (Blueprint $table) {
            // Change status from enum to string
            $table->string('status')->change();
            
            // Add show field (show/hide)
            $table->enum('show', ['show', 'hide'])->default('show')->after('status');
            
            // Add brochure URL
            $table->string('brochure_url')->nullable()->after('details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yachts', function (Blueprint $table) {
            // Drop new fields
            $table->dropColumn('show');
            $table->dropColumn('brochure_url');
        });
    }
};
