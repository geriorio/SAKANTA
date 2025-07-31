<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'title' => 'Rumah Modern Minimalis Jakarta Selatan',
                'description' => 'Rumah modern minimalis di kawasan elite Jakarta Selatan dengan akses mudah ke berbagai fasilitas umum. Desain kontemporer dengan material berkualitas tinggi. Lingkungan yang aman dan nyaman untuk keluarga.',
                'address' => 'Jl. Kemang Raya No. 123',
                'city' => 'Jakarta Selatan',
                'province' => 'DKI Jakarta',
                'price' => 4000000000,
                'total_shares' => 8,
                'available_shares' => 6,
                'price_per_share' => 500000000,
                'property_type' => 'rumah',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'land_area' => 200,
                'building_area' => 150,
                'images' => [
                    'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Garasi', 'Taman', 'Security 24 Jam', 'Swimming Pool'],
                'expected_rental_yield' => 12,
                'is_featured' => true,
            ],
            [
                'title' => 'Apartemen Premium Sudirman',
                'description' => 'Unit apartemen premium di kawasan bisnis Sudirman dengan view city yang menakjubkan. Fasilitas lengkap dan lokasi strategis di jantung Jakarta.',
                'address' => 'Jl. Jend. Sudirman Kav. 45',
                'city' => 'Jakarta Pusat',
                'province' => 'DKI Jakarta',
                'price' => 2400000000,
                'total_shares' => 8,
                'available_shares' => 8,
                'price_per_share' => 300000000,
                'property_type' => 'apartemen',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'land_area' => null,
                'building_area' => 75,
                'images' => [
                    'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Gym', 'Swimming Pool', 'Concierge', 'Sky Garden'],
                'expected_rental_yield' => 10,
                'is_featured' => true,
            ],
            [
                'title' => 'Ruko Strategis Bintaro',
                'description' => 'Ruko 3 lantai di kawasan komersial Bintaro dengan tingkat okupansi tinggi. Cocok untuk investasi jangka panjang dengan return yang stabil.',
                'address' => 'Jl. Bintaro Utama Raya No. 88',
                'city' => 'Tangerang Selatan',
                'province' => 'Banten',
                'price' => 3200000000,
                'total_shares' => 8,
                'available_shares' => 5,
                'price_per_share' => 400000000,
                'property_type' => 'ruko',
                'bedrooms' => null,
                'bathrooms' => 4,
                'land_area' => 80,
                'building_area' => 240,
                'images' => [
                    'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Parkir Luas', 'AC', 'Lift', 'Loading Dock'],
                'expected_rental_yield' => 15,
                'is_featured' => false,
            ],
            [
                'title' => 'Villa Mewah Bogor',
                'description' => 'Villa mewah dengan pemandangan pegunungan di kawasan sejuk Bogor. Perfect untuk retreat dan investasi property leisure.',
                'address' => 'Jl. Raya Puncak KM 15',
                'city' => 'Bogor',
                'province' => 'Jawa Barat',
                'price' => 1600000000,
                'total_shares' => 8,
                'available_shares' => 7,
                'price_per_share' => 200000000,
                'property_type' => 'villa',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'land_area' => 500,
                'building_area' => 300,
                'images' => [
                    'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Private Pool', 'BBQ Area', 'Garden', 'Mountain View'],
                'expected_rental_yield' => 8,
                'is_featured' => true,
            ],
            [
                'title' => 'Townhouse Modern BSD',
                'description' => 'Townhouse modern di cluster premium BSD dengan konsep green living dan smart home technology.',
                'address' => 'BSD Green Office Park',
                'city' => 'Tangerang Selatan',
                'province' => 'Banten',
                'price' => 2800000000,
                'total_shares' => 8,
                'available_shares' => 4,
                'price_per_share' => 350000000,
                'property_type' => 'townhouse',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'land_area' => 150,
                'building_area' => 120,
                'images' => [
                    'https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Smart Home', 'Club House', 'Jogging Track', 'Playground'],
                'expected_rental_yield' => 11,
                'is_featured' => true,
            ],
            [
                'title' => 'Kondominium Pondok Indah',
                'description' => 'Unit kondominium eksklusif di Pondok Indah dengan fasilitas resort-style living dan security terjamin.',
                'address' => 'Jl. Metro Pondok Indah',
                'city' => 'Jakarta Selatan',
                'province' => 'DKI Jakarta',
                'price' => 3600000000,
                'total_shares' => 8,
                'available_shares' => 3,
                'price_per_share' => 450000000,
                'property_type' => 'kondominium',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'land_area' => null,
                'building_area' => 95,
                'images' => [
                    'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1493809842364-78817add7ffb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Resort Pool', 'Tennis Court', 'Spa', 'Business Center'],
                'expected_rental_yield' => 9,
                'is_featured' => false,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
