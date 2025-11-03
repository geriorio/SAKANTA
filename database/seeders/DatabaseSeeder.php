<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LocationSeeder::class,
            PropertySeeder::class,
        ]);
        
        // Create admin user
        User::create([
            'name' => 'Admin Sakanta',
            'email' => 'admin@sakanta.com',
            'password' => bcrypt('password'),
            'phone' => '08123456789',
        ]);
    }
}
