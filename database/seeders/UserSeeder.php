<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'SuperUser',
            'username' => 'superuser',
            'email' => 'superuser@example.com',
            'phone' => '085669920357',
            'password' => bcrypt('123456789'),
        ]);
        $superAdminRole = Role::findByName('SuperUser');
        $user->assignRole($superAdminRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'AdminUser',
            'username' => 'adminuser',
            'email' => 'adminuser@example.com',
            'phone' => '085669920000',
            'password' => bcrypt('123456789'),
        ]);
        $adminRole = Role::findByName('Admin');
        $user->assignRole($adminRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'EmployeUser',
            'username' => 'employe',
            'email' => 'employe@example.com',
            'phone' => '085669920909',
            'password' => bcrypt('123456789'),
        ]);
        $employeRole = Role::findByName('Employe');
        $user->assignRole($employeRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'GuestUser',
            'username' => 'guest',
            'email' => 'guest@example.com',
            'phone' => '085669920901',
            'password' => bcrypt('123456789'),
        ]);
        $guestRole = Role::findByName('Guest');
        $user->assignRole($guestRole);
    }
}
