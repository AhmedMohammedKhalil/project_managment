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
            'username' => 'أحمد سعيد',
            'email' => 'ahmed@projectmanagment.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'محمود عبادي ',
            'email' => 'mahmoud@projectmanagment.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'سعدان القحطاني ',
            'email' => 'saadan@projectmanagment.com',
            'password' => Hash::make('password'),
        ]);
    }
}
