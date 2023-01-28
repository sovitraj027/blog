<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserTableSeeder extends Seeder
{
     use HasRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        'name' => 'Super Admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin@123'),
        'user_type_id' => 1,
        ];

        $user = User::create($data);
        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole('Admin');

    }
}
