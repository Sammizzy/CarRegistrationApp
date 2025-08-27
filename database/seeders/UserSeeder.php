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
        $users = [
            [
                'first_name' => 'Noneadmin1',
                'last_name' => 'User1',
                'car_registration' => 'User001',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'theme' => 'light',
            ],
            [
                'first_name' => 'Noneadmin2',
                'last_name' => 'User2',
                'car_registration' => 'User002',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'theme' => 'light',
            ],
            [
                'first_name' => 'Noneadmin3',
                'last_name' => 'User3',
                'car_registration' => 'User003',
                'email' => 'user3@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'theme' => 'light',
            ],
            [
                'first_name' => 'Noneadmin4',
                'last_name' => 'User4',
                'car_registration' => 'User004',
                'email' => 'user4@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'theme' => 'light',
            ],
            [
                'first_name' => 'Noneadmin5',
                'last_name' => 'User5',
                'car_registration' => 'User005',
                'email' => 'user5@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'theme' => 'light',
            ],
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']], // unique key
                $userData
            );
        }
    }
}
