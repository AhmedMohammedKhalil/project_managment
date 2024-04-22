<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'joan josef',
            'email' => 'joan@projectmanagment.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'cristensin',
            'email' => 'cristensin@projectmanagment.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'philip',
            'email' => 'philip@projectmanagment.com',
            'password' => Hash::make('password'),
        ]);
    }
}
