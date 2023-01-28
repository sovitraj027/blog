<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        [
        'name' => 'Science Fiction',
        'slug' => 'science_fiction',
        ],
        [
        'name' => 'History',
        'slug' => 'history',
        ],
        [
        'name' => 'Romance',
        'slug' => 'romance',
        ],
        [
        'name' => 'Technology',
        'slug' => 'technology',
        ],
        ];
        DB::table('categories')->insert($categories);
    }
}
