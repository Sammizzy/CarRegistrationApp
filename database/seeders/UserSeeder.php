<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'first_name' => 'Noneadmin',
                'last_name' => 'User',
                'car_registration' => 'User001',
                'password' => Hash::make('password'), // change in production
                'is_admin' => false,
                'theme' => 'light',
            ],
        );
    }
}
