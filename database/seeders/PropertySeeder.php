<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get locations
        $bali = Location::where('slug', 'bali')->first();
        $bogor = Location::where('slug', 'bogor')->first();
        $bandung = Location::where('slug', 'bandung')->first();
        $rajaAmpat = Location::where('slug', 'raja-ampat')->first();

        // Delete existing properties to avoid duplicates
        Property::query()->delete();

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
                'location_id' => $bali?->id,
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
                'location_id' => $bali?->id,
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
                'location_id' => $bandung?->id,
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
                'location_id' => $bogor?->id,
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
                'location_id' => $rajaAmpat?->id,
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
                'location_id' => $bali?->id,
            ],
            // BALI - Property 4
            [
                'title' => 'Villa Eksotis Bali Ubud',
                'description' => 'Villa tradisional Bali dengan pemandangan sawah terasering di Ubud. Kombinasi sempurna antara budaya lokal dan kenyamanan modern.',
                'address' => 'Jl. Raya Ubud KM 8',
                'city' => 'Ubud',
                'province' => 'Bali',
                'price' => 5000000000,
                'total_shares' => 8,
                'available_shares' => 8,
                'price_per_share' => 625000000,
                'property_type' => 'villa',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'land_area' => 1200,
                'building_area' => 350,
                'images' => [
                    'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1537359482254-e34219b850e9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Private Garden', 'Infinity Pool', 'Rice Field View', 'Yoga Deck'],
                'expected_rental_yield' => 14,
                'is_featured' => true,
                'location_id' => $bali?->id,
            ],
            // BALI - Property 5
            [
                'title' => 'Resort Luxury Bali Seminyak',
                'description' => 'Unit resort luxury di kawasan Seminyak dengan beach club access dan water sports facilities.',
                'address' => 'Jl. Pantai Seminyak',
                'city' => 'Seminyak',
                'province' => 'Bali',
                'price' => 7200000000,
                'total_shares' => 8,
                'available_shares' => 5,
                'price_per_share' => 900000000,
                'property_type' => 'resort',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'land_area' => 2000,
                'building_area' => 500,
                'images' => [
                    'https://images.unsplash.com/photo-1582719471384-894fbb16e074?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1520763185298-1b434c919eba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Beach Club', 'Water Sports', 'Multiple Pools', 'Spa Facility'],
                'expected_rental_yield' => 16,
                'is_featured' => true,
                'location_id' => $bali?->id,
            ],
            // BOGOR - Property 2
            [
                'title' => 'Villa Premium Puncak',
                'description' => 'Villa premium di kawasan Puncak dengan fasilitas lengkap dan view pegunungan yang spektakuler.',
                'address' => 'Jl. Raya Puncak KM 22',
                'city' => 'Bogor',
                'province' => 'Jawa Barat',
                'price' => 2400000000,
                'total_shares' => 8,
                'available_shares' => 6,
                'price_per_share' => 300000000,
                'property_type' => 'villa',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'land_area' => 800,
                'building_area' => 280,
                'images' => [
                    'https://images.unsplash.com/photo-1505873242329-74cdcc4b2b2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Private Pool', 'Mountain View', 'Garden', 'Fireplace'],
                'expected_rental_yield' => 9,
                'is_featured' => true,
                'location_id' => $bogor?->id,
            ],
            // BOGOR - Property 3
            [
                'title' => 'Apartemen Bogor Valley',
                'description' => 'Apartemen modern di kompleks Bogor Valley dengan fasilitas komunitas yang lengkap.',
                'address' => 'Bogor Valley Residences',
                'city' => 'Bogor',
                'province' => 'Jawa Barat',
                'price' => 1200000000,
                'total_shares' => 8,
                'available_shares' => 8,
                'price_per_share' => 150000000,
                'property_type' => 'apartemen',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'land_area' => null,
                'building_area' => 65,
                'images' => [
                    'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1502101613408-eca07ce68773?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Gym', 'Pool', 'Playground', 'Community Center'],
                'expected_rental_yield' => 7,
                'is_featured' => false,
                'location_id' => $bogor?->id,
            ],
            // BOGOR - Property 4
            [
                'title' => 'Rumah Kebun Bogor',
                'description' => 'Rumah dengan halaman luas di kawasan hijau Bogor, sempurna untuk keluarga yang mencari kehidupan yang tenang.',
                'address' => 'Jl. Ciawi Raya No. 45',
                'city' => 'Bogor',
                'province' => 'Jawa Barat',
                'price' => 3000000000,
                'total_shares' => 8,
                'available_shares' => 7,
                'price_per_share' => 375000000,
                'property_type' => 'rumah',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'land_area' => 1000,
                'building_area' => 350,
                'images' => [
                    'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Large Garden', 'Pond', 'Greenhouse', 'Tennis Court'],
                'expected_rental_yield' => 8,
                'is_featured' => true,
                'location_id' => $bogor?->id,
            ],
            // BOGOR - Property 5
            [
                'title' => 'Estate Mewah Bogor',
                'description' => 'Estate mewah di lokasi eksklusif dengan keamanan 24 jam dan amenities premium.',
                'address' => 'Jl. Sukabumi Raya',
                'city' => 'Bogor',
                'province' => 'Jawa Barat',
                'price' => 4500000000,
                'total_shares' => 8,
                'available_shares' => 4,
                'price_per_share' => 562500000,
                'property_type' => 'rumah',
                'bedrooms' => 6,
                'bathrooms' => 5,
                'land_area' => 1500,
                'building_area' => 400,
                'images' => [
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Private Gate', '24hr Security', 'Helipad', 'Wine Cellar'],
                'expected_rental_yield' => 10,
                'is_featured' => true,
                'location_id' => $bogor?->id,
            ],
            // BANDUNG - Property 2
            [
                'title' => 'Villa Modern Lembang',
                'description' => 'Villa modern di Lembang dengan pemandangan kota Bandung dan teknologi smart home terkini.',
                'address' => 'Jl. Tangkuban Perahu, Lembang',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'price' => 2800000000,
                'total_shares' => 8,
                'available_shares' => 8,
                'price_per_share' => 350000000,
                'property_type' => 'villa',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'land_area' => 600,
                'building_area' => 250,
                'images' => [
                    'https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Smart Home', 'City View', 'Infinity Pool', 'Home Automation'],
                'expected_rental_yield' => 11,
                'is_featured' => true,
                'location_id' => $bandung?->id,
            ],
            // BANDUNG - Property 3
            [
                'title' => 'Apartemen Dago Bandung',
                'description' => 'Apartemen eksklusif di Dago dengan lokasi strategis dekat dengan pusat perbelanjaan dan restoran.',
                'address' => 'Jl. Dago No. 123',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'price' => 1600000000,
                'total_shares' => 8,
                'available_shares' => 6,
                'price_per_share' => 200000000,
                'property_type' => 'apartemen',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'land_area' => null,
                'building_area' => 70,
                'images' => [
                    'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Gym', 'Swimming Pool', 'Co-working Space', 'CCTV'],
                'expected_rental_yield' => 8,
                'is_featured' => false,
                'location_id' => $bandung?->id,
            ],
            // BANDUNG - Property 4
            [
                'title' => 'Townhouse Cipanewu',
                'description' => 'Townhouse berkualitas di Cipanewu dengan area common yang luas dan parkir terpisah.',
                'address' => 'Cipanewu Residences',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'price' => 1800000000,
                'total_shares' => 8,
                'available_shares' => 7,
                'price_per_share' => 225000000,
                'property_type' => 'townhouse',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'land_area' => 120,
                'building_area' => 110,
                'images' => [
                    'https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Community Area', 'Parking', 'Playground', 'Security'],
                'expected_rental_yield' => 9,
                'is_featured' => false,
                'location_id' => $bandung?->id,
            ],
            // BANDUNG - Property 5
            [
                'title' => 'Resort & Cottage Bandung',
                'description' => 'Resort dengan cottage units di area wisata Bandung, sempurna untuk properti investasi leisure.',
                'address' => 'Jl. Tangkuban Perahu KM 35',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'price' => 3500000000,
                'total_shares' => 8,
                'available_shares' => 5,
                'price_per_share' => 437500000,
                'property_type' => 'resort',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'land_area' => 3000,
                'building_area' => 450,
                'images' => [
                    'https://images.unsplash.com/photo-1582719471384-894fbb16e074?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1520763185298-1b434c919eba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Restaurant', 'Pool', 'Spa', 'Conference Room'],
                'expected_rental_yield' => 13,
                'is_featured' => true,
                'location_id' => $bandung?->id,
            ],
            // RAJA AMPAT - Property 2
            [
                'title' => 'Overwater Bungalow Raja Ampat',
                'description' => 'Bungalow eksklusif di atas air dengan akses langsung ke pantai dan snorkeling opportunities.',
                'address' => 'Pulau Pef, Raja Ampat',
                'city' => 'Raja Ampat',
                'province' => 'Papua Barat',
                'price' => 8000000000,
                'total_shares' => 8,
                'available_shares' => 8,
                'price_per_share' => 1000000000,
                'property_type' => 'bungalow',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'land_area' => null,
                'building_area' => 120,
                'images' => [
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1502528278042-94f7708e1ef0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Water Access', 'Snorkeling', 'Diving', 'Restaurant'],
                'expected_rental_yield' => 20,
                'is_featured' => true,
                'location_id' => $rajaAmpat?->id,
            ],
            // RAJA AMPAT - Property 3
            [
                'title' => 'Eco Resort Raja Ampat',
                'description' => 'Eco-friendly resort dengan konsep sustainable tourism di tengah keindahan alam Raja Ampat.',
                'address' => 'Pulau Kri, Raja Ampat',
                'city' => 'Raja Ampat',
                'province' => 'Papua Barat',
                'price' => 12000000000,
                'total_shares' => 8,
                'available_shares' => 6,
                'price_per_share' => 1500000000,
                'property_type' => 'resort',
                'bedrooms' => 8,
                'bathrooms' => 6,
                'land_area' => 5000,
                'building_area' => 800,
                'images' => [
                    'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1537359482254-e34219b850e9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Eco Facilities', 'Diving Center', 'Research Lab', 'Restaurant'],
                'expected_rental_yield' => 22,
                'is_featured' => true,
                'location_id' => $rajaAmpat?->id,
            ],
            // RAJA AMPAT - Property 4
            [
                'title' => 'Private Island Villa Raja Ampat',
                'description' => 'Villla pribadi di pulau ekslusif dengan fasilitas mewah dan privacy maksimal.',
                'address' => 'Pulau Pribadi, Raja Ampat',
                'city' => 'Raja Ampat',
                'province' => 'Papua Barat',
                'price' => 15000000000,
                'total_shares' => 8,
                'available_shares' => 4,
                'price_per_share' => 1875000000,
                'property_type' => 'villa',
                'bedrooms' => 6,
                'bathrooms' => 5,
                'land_area' => 10000,
                'building_area' => 600,
                'images' => [
                    'https://images.unsplash.com/photo-1445019980597-0d455de63d7e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1520763185298-1b434c919eba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Private Dock', 'Helipad', 'Yacht Service', 'Gourmet Kitchen'],
                'expected_rental_yield' => 18,
                'is_featured' => true,
                'location_id' => $rajaAmpat?->id,
            ],
            // RAJA AMPAT - Property 5
            [
                'title' => 'Liveaboard Yacht Raja Ampat',
                'description' => 'Mewah liveaboard yacht experience dengan crew profesional dan itinerary khusus.',
                'address' => 'Pelabuhan Raja Ampat',
                'city' => 'Raja Ampat',
                'province' => 'Papua Barat',
                'price' => 10000000000,
                'total_shares' => 8,
                'available_shares' => 8,
                'price_per_share' => 1250000000,
                'property_type' => 'yacht',
                'bedrooms' => 6,
                'bathrooms' => 4,
                'land_area' => null,
                'building_area' => 450,
                'images' => [
                    'https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                    'https://images.unsplash.com/photo-1541417904180-52e7b277773b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80'
                ],
                'amenities' => ['Full Crew', 'Water Toys', 'Diving Equipment', 'Professional Chef'],
                'expected_rental_yield' => 25,
                'is_featured' => true,
                'location_id' => $rajaAmpat?->id,
            ],
        ];

        foreach ($properties as $property) {
            // Generate slug from title
            $property['slug'] = \Illuminate\Support\Str::slug($property['title']);
            // Set default status
            $property['status'] = 'available';
            Property::create($property);
        }
    }
}
