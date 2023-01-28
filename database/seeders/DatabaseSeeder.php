<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleTableSeeder::class);
        $this->call(PermissonTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(UserTableSeeder::class);

        

    }
}
