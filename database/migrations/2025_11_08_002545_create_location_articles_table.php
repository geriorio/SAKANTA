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
        Schema::create('location_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            
            // Section 1: Title - Image - Description
            $table->string('section1_title');
            $table->string('section1_image')->nullable();
            $table->text('section1_desc');
            
            // Section 2: Subtitle - Paragraphs
            $table->string('section2_subtitle');
            $table->json('section2_paragraphs'); // Array of paragraphs
            
            // Section 3: Punchline
            $table->text('section3_punchline');
            
            // Section 4: Take Away Points
            $table->json('section4_points'); // Array of {title, explanation}
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_articles');
    }
};
