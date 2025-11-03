<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UpdatePropertySlugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = Property::all();
        
        foreach ($properties as $property) {
            if (!$property->slug) {
                $property->slug = Str::slug($property->title);
            }
            if (!$property->main_image) {
                $images = ['/images/villa1.jpg', '/images/villa2.jpg', '/images/villa3.jpg', '/images/villa4.jpg', '/images/villa5.jpg', '/images/villa6.jpg'];
                $property->main_image = $images[array_rand($images)];
            }
            $property->save();
        }
        
        $this->command->info('Properties updated with slugs and main images!');
    }
}
