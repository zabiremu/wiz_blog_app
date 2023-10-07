<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'status' => 1,
            'is_admin' => 1
        ]);

        // Create user\
        User::updateOrCreate([
            'name' => 'Jone Doe',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'status' => 1,
            'is_admin' => 0
        ]);
    }
}
