<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'Site',
                'last_name' => 'Admin',
                'car_registration' => 'ADMIN001',
                'password' => Hash::make('password'), // change in production
                'is_admin' => true,
                'theme' => 'light',
            ],
        );
    }
}
