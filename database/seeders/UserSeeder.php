<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name'     => 'Tajbin Anik',
                'email'    => 'anik@gmail.com',
                'password' => Hash::make(12345678),
                'is_admin' => 1
            ]
        );

        User::create(
            [
                'name'     => 'Nabil Saad',
                'email'    => 'nabil@gmail.com',
                'password' => Hash::make(12345678),
                'is_admin' => 0
            ]
        );
    }
}
