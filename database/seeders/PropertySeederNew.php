<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Location;
use Illuminate\Database\Seeder;

class PropertySeederNew extends Seeder
{
    public function run(): void
    {
        // Get locations
        $bali = Location::where('slug', 'bali')->first();
        $bogor = Location::where('slug', 'bogor')->first();
        $bandung = Location::where('slug', 'bandung')->first();
        $rajaAmpat = Location::where('slug', 'raja-ampat')->first();

        // Clear existing
        Property::query()->delete();

        $properties = [
            [
                'title' => 'Rumah Modern Minimalis Jakarta Selatan',
                'subtitle' => 'Modern Living in Elite Area',
                'description' => 'Rumah modern minimalis di kawasan elite Jakarta Selatan dengan akses mudah ke berbagai fasilitas umum. Desain kontemporer dengan material berkualitas tinggi.',
                'address' => 'Jl. Kemang Raya No. 123',
                'city' => 'Jakarta Selatan',
                'province' => 'DKI Jakarta',
                'price' => 4000000000,
                'ownership' => '1/4 Ownership',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'land_area' => 200,
                'building_area' => 150,
                'images' => ['https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1000', 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=1000'],
                'facilities' => [],
                'surroundings' => [],
                'perfect_for' => "Young families\nUrban professionals\nInvestment seekers",
                'status' => 'available',
                'location_id' => $bali?->id,
            ],
            [
                'title' => 'Apartemen Premium Sudirman',
                'subtitle' => 'City Living at Its Finest',
                'description' => 'Unit apartemen premium di kawasan bisnis Sudirman dengan view city yang menakjubkan.',
                'address' => 'Jl. Jend. Sudirman Kav. 45',
                'city' => 'Jakarta Pusat',
                'province' => 'DKI Jakarta',
                'price' => 2400000000,
                'ownership' => '1/8 Ownership',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'land_area' => 0,
                'building_area' => 75,
                'images' => ['https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=1000'],
                'facilities' => [],
                'surroundings' => [],
                'perfect_for' => "Single professionals\nYoung couples\nInvestors",
                'status' => 'available',
                'location_id' => $bali?->id,
            ],
            [
                'title' => 'Villa Mewah Bogor',
                'subtitle' => 'Mountain Retreat Paradise',
                'description' => 'Villa mewah dengan pemandangan pegunungan di kawasan sejuk Bogor.',
                'address' => 'Jl. Raya Puncak KM 15',
                'city' => 'Bogor',
                'province' => 'Jawa Barat',
                'price' => 1600000000,
                'ownership' => '1/4 Ownership',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'land_area' => 500,
                'building_area' => 300,
                'images' => ['https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=1000'],
                'facilities' => [],
                'surroundings' => [],
                'perfect_for' => "Weekend getaways\nRetirement living\nFamily vacations",
                'status' => 'available',
                'location_id' => $bogor?->id,
            ],
        ];

        foreach ($properties as $property) {
            $property['slug'] = \Illuminate\Support\Str::slug($property['title']);
            Property::create($property);
        }
    }
}
