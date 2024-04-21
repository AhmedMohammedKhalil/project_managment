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
            'title' => 'مشروع 1',
            'start_date' => now(),
            'end_date' => now(),
            'short_description' => 'وصف قصير عن مشروع 1',
            'phase' => 'design',
            'uid' => '1',
        ]);

        DB::table('projects')->insert([
            'title' => 'مشروع 2',
            'start_date' => now(),
            'end_date' => now(),
            'short_description' => 'وصف قصير عن مشروع 2',
            'phase' => 'development',
            'uid' => '1',
        ]);

        DB::table('projects')->insert([
            'title' => 'مشروع 3',
            'start_date' => now(),
            'end_date' => now(),
            'short_description' => 'وصف قصير عن مشروع 3',
            'phase' => 'testing',
            'uid' => '2',
        ]);

        DB::table('projects')->insert([
            'title' => 'مشروع 4',
            'start_date' => now(),
            'end_date' => now(),
            'short_description' => 'وصف قصير عن مشروع 4',
            'phase' => 'development',
            'uid' => '2',
        ]);

        DB::table('projects')->insert([
            'title' => 'مشروع 5',
            'start_date' => now(),
            'end_date' => now(),
            'short_description' => 'وصف قصير عن مشروع 5',
            'phase' => 'complete',
            'uid' => '3',
        ]);

        DB::table('projects')->insert([
            'title' => 'مشروع 6',
            'start_date' => now(),
            'end_date' => now(),
            'short_description' => 'وصف قصير عن مشروع 6',
            'phase' => 'development',
            'uid' => '3',
        ]);
    }
}
