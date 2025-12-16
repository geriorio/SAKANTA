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
            $table->string('slug')->nullable()->after('name');
        });
        
        // Generate slugs for existing yachts
        $yachts = \App\Models\Yacht::whereNull('slug')->orWhere('slug', '')->get();
        foreach ($yachts as $yacht) {
            $slug = \Illuminate\Support\Str::slug($yacht->name);
            $originalSlug = $slug;
            $counter = 1;
            
            while (\App\Models\Yacht::where('slug', $slug)->where('id', '!=', $yacht->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            
            $yacht->slug = $slug;
            $yacht->save();
        }
        
        // Now make slug unique
        Schema::table('yachts', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yachts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
