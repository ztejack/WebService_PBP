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
        // Permission::create(['name' => 'store-users']);
        // Permission::create(['name' => 'update-users']);
        // Permission::create(['name' => 'delete-users']);
        // Permission::create(['name' => 'getall-users']);
        // Permission::create(['name' => 'search-users']);
        // Permission::create(['name' => 'show-users']);
        Permission::create(['name' => 'SuperUserManagement']);
        Permission::create(['name' => 'UserManagement']);
        Permission::create(['name' => 'UserManagement.create']);
        Permission::create(['name' => 'UserManagement.view']);
        Permission::create(['name' => 'UserManagement.update']);
        Permission::create(['name' => 'RoleManagement']);
        Permission::create(['name' => 'RoleManagement.create']);
        Permission::create(['name' => 'RoleManagement.view']);
        Permission::create(['name' => 'RoleManagement.update']);
        Permission::create(['name' => 'SatkerManagement']);
        Permission::create(['name' => 'SatkerManagement.create']);
        Permission::create(['name' => 'SatkerManagement.view']);
        Permission::create(['name' => 'SatkerManagement.update']);
        Permission::create(['name' => 'ContractManagement']);
        Permission::create(['name' => 'SalaryManagement']);
        Permission::create(['name' => 'PositionManagement']);
        Permission::create(['name' => 'GolonganManagement']);
        Permission::create(['name' => 'GajiManagement']);
        Permission::create(['name' => 'GajiManagement.create']);
        Permission::create(['name' => 'GajiManagement.view']);
        Permission::create(['name' => 'GajiManagement.update']);

        Permission::create(['name' => 'AprovalGajiLv1']);
        Permission::create(['name' => 'AprovalGajiLv2']);




        // // employe
        // Permission::create(['name' => 'store-employe']);
        // Permission::create(['name' => 'update-employe']);
        // Permission::create(['name' => 'delete-employe']);
        // Permission::create(['name' => 'getall-employe']);
        // Permission::create(['name' => 'search-employe']);
        // Permission::create(['name' => 'show-employe']);

        // // ROLES
        // Permission::create(['name' => 'assign-role']);
        // Permission::create(['name' => 'remove-role']);

        // Permission::create(['name' => 'assign-role-su']);
        // Permission::create(['name' => 'remove-role-su']);

        //ROLE USERS
        $superuserRole = Role::create(['name' => 'SuperUser']);
        $adminRole = Role::create(['name' => 'Admin']);
        $employeRole = Role::create(['name' => 'Employe']);
        $guestRole = Role::create(['name' => 'Guest']);
        $AdminKeuanganRole = Role::create(['name' => 'AdminKeuangan']);
        $ManagerRole = Role::create(['name' => 'Manager']);
        $AdminSDMRole = Role::create(['name' => 'AdminSDM']);

        $superuserRole->givePermissionTo([
            'UserManagement',
            'SuperUserManagement',
            'RoleManagement',
            'SatkerManagement',
            'ContractManagement',
            'SalaryManagement',
            'PositionManagement',
            'GolonganManagement',
            'GajiManagement',
            'AprovalGajiLv1',
            'AprovalGajiLv2',
            // 'assign-role-su',
            // 'remove-role-su',

            // 'assign-role',
            // 'remove-role',

            // 'store-users',
            // 'update-users',
            // 'delete-users',
            // 'getall-users',
            // 'search-users',
            // 'show-users',

            // 'store-employe',
            // 'update-employe',
            // 'delete-employe',
            // 'getall-employe',
            // 'search-employe',
            // 'show-employe',
        ]);
        $adminRole->givePermissionTo([
            'UserManagement',
            'RoleManagement.create',
            'SatkerManagement',
            'ContractManagement',
            'SalaryManagement',
            'PositionManagement',
            'GolonganManagement',
            'GajiManagement',
            'AprovalGajiLv1',
            'AprovalGajiLv2',
        ]);
        $AdminSDMRole->givePermissionTo([
            'UserManagement',
            'RoleManagement.create',
            'SatkerManagement',
            'ContractManagement',
            'SalaryManagement',
            'PositionManagement',
            'GolonganManagement',
            'GajiManagement',
        ]);
        $ManagerRole->givePermissionTo([
            'UserManagement.view',
            'AprovalGajiLv1',
            'AprovalGajiLv2',
        ]);


        // $adminRole->givePermissionTo([]);
    }
}
