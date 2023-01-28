<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tags = [
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
         DB::table('tags')->insert($tags);
    }
}
