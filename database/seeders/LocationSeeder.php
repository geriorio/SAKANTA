<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Bali',
                'slug' => 'bali',
                'description' => 'The Island of Gods',
                'image' => 'bali1.jpg'
            ],
            [
                'name' => 'Bogor',
                'slug' => 'bogor',
                'description' => 'The City of Rain',
                'image' => 'bogor1.jpg'
            ],
            [
                'name' => 'Bandung',
                'slug' => 'bandung',
                'description' => 'The Paris of Java',
                'image' => 'bandung1.jpg'
            ],
            [
                'name' => 'Raja Ampat',
                'slug' => 'raja-ampat',
                'description' => 'The Four Kings',
                'image' => 'rajaampat1.jpg'
            ]
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
