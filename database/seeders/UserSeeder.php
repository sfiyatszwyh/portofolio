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
        User::create([
            'name' => 'User',
            'email' => 'user@arkatama.test',
            'gender' => 'P',
            'tanggal_lahir' => '2000-01-01',
            'phone_number' => '20000101',
            // 'profile' => 'oii',
            'address' => 'jalan kenangan',
            'role' => 'user',
            'password' => Hash::make('12345'),
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@arkatama.test',
            'gender' => 'P',
            'tanggal_lahir' => '2000-01-01',
            'phone_number' => '20000101',
            // 'profile' => 'oii',
            'address' => 'jalan kenangan',
            'role' => 'admin',
            'password' => Hash::make('12345'),
        ]);
    }
}
