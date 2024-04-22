<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'title' => 'project 1',
            'start_date' => now(),
            'end_date' => date('Y-m-d', strtotime('+1 day')),
            'short_description' => 'short description about project 1',
            'phase' => 'design',
            'uid' => '1',
        ]);

        DB::table('projects')->insert([
            'title' => 'project 2',
            'start_date' => now(),
            'end_date' => date('Y-m-d', strtotime('+1 day')),
            'short_description' => 'short description about project 2',
            'phase' => 'development',
            'uid' => '1',
        ]);

        DB::table('projects')->insert([
            'title' => 'project 3',
            'start_date' => now(),
            'end_date' => date('Y-m-d', strtotime('+1 day')),
            'short_description' => 'short description about project 3',
            'phase' => 'testing',
            'uid' => '2',
        ]);

        DB::table('projects')->insert([
            'title' => 'project 4',
            'start_date' => now(),
            'end_date' => date('Y-m-d', strtotime('+1 day')),
            'short_description' => 'short description about project 4',
            'phase' => 'development',
            'uid' => '2',
        ]);

        DB::table('projects')->insert([
            'title' => 'project 5',
            'start_date' => now(),
            'end_date' => now(),
            'short_description' => 'short description about project 5',
            'phase' => 'complete',
            'uid' => '3',
        ]);

        DB::table('projects')->insert([
            'title' => 'project 6',
            'start_date' => now(),
            'end_date' => date('Y-m-d', strtotime('+1 day')),
            'short_description' => 'short description about project 6',
            'phase' => 'development',
            'uid' => '3',
        ]);
    }
}
