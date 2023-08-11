<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // USERS
        Permission::create(['name' => 'store-users']);
        Permission::create(['name' => 'update-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'getall-users']);
        Permission::create(['name' => 'search-users']);
        Permission::create(['name' => 'show-users']);

        // employe
        Permission::create(['name' => 'store-employe']);
        Permission::create(['name' => 'update-employe']);
        Permission::create(['name' => 'delete-employe']);
        Permission::create(['name' => 'getall-employe']);
        Permission::create(['name' => 'search-employe']);
        Permission::create(['name' => 'show-employe']);

        // ROLES
        Permission::create(['name' => 'assign-role']);
        Permission::create(['name' => 'remove-role']);

        Permission::create(['name' => 'assign-role-su']);
        Permission::create(['name' => 'remove-role-su']);

        //ROLE USERS
        $superadminRole = Role::create(['name' => 'SuperAdmin']);
        $adminRole = Role::create(['name' => 'Admin']);

        $superadminRole->givePermissionTo([
            'assign-role-su',
            'remove-role-su',

            'assign-role',
            'remove-role',

            'store-users',
            'update-users',
            'delete-users',
            'getall-users',
            'search-users',
            'show-users',

            'store-employe',
            'update-employe',
            'delete-employe',
            'getall-employe',
            'search-employe',
            'show-employe',
        ]);
        $adminRole->givePermissiionTo([
            'assign-role',
            'remove-role',

            'store-users',
            'update-users',
            'delete-users',
            'getall-users',
            'search-users',
            'show-users',

            'store-employe',
            'update-employe',
            'delete-employe',
            'getall-employe',
            'search-employe',
            'show-employe',
        ]);
    }
}
