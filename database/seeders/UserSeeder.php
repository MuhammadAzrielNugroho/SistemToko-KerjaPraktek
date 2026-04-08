<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'azriel@gmail.com'], // unik
            [
                'name' => 'Azriel',
                'password' => Hash::make('123456'),
            ]
        );
    }
}