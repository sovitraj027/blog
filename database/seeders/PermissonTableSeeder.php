<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'view-user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create-user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit-user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete-user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view-post',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create-post',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit-post',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete-post',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view-tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create-tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit-tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete-tag',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view-category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create-category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit-category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete-category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete-role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view-site',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit-site',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create-site',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete-site',
                'guard_name' => 'web',
            ],

        ];
        DB::table('permissions')->insert($permissions);
    }
}
