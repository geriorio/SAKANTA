<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sakanta.com',
            'password' => Hash::make('admin123'),
            'phone' => '081234567890',
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        echo "Admin user created successfully!\n";
        echo "Email: admin@sakanta.com\n";
        echo "Password: admin123\n";
    }
}
