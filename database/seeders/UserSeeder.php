<?php

namespace Database\Seeders;

use App\Events\UserCreating;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Event;
use Ramsey\Uuid\Rfc4122\UuidV4;
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
            'uuid' => UuidV4::uuid4()->getHex(),
            'name' => 'SuperUser',
            'username' => 'superuser',
            'email' => 'superuser@example.com',
            'phone' => '085669920357',
            'password' => '$2y$10$wl5dyPDgUcZNNs9sqLVP2.NXe6q//rJqvbeuYlvacgrt7ahNXK8ma', //default PBP2023@SU
        ]);
        $superAdminRole = Role::findByName('SuperUser');
        $user->assignRole($superAdminRole);
        $user->employee->update(['status' => true]);


        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'AdminUser',
            'username' => 'adminuser',
            'email' => 'adminuser@example.com',
            'phone' => '085669920000',
            'password' => '$2y$10$f/cQPkLWDFE1U472RSFN0.hr.WEU2aP5kJrFD6vujDgEHWDNV/mU6', //default PBP2023@ADM
        ]);
        $adminRole = Role::findByName('Admin');
        $user->assignRole($adminRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'EmployeUser',
            'username' => 'employe',
            'email' => 'employe@example.com',
            'phone' => '085669920909',
            'password' => '$2y$10$C3/KCSiV5eIMaNHCv/2zFuF2OTofdVGMhkeljSWY7ygSFzCszGVAq', //PBP2023@Us
        ]);
        $employeRole = Role::findByName('Employe');
        $user->assignRole($employeRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'GuestUser',
            'username' => 'guest',
            'email' => 'guest@example.com',
            'phone' => '085669920901',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $guestRole = Role::findByName('Guest');
        $user->assignRole($guestRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'AdminKeuanganUser',
            'username' => 'adminkeuangan',
            'email' => 'adminkeuangan@example.com',
            'phone' => '085669920808',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $adminkeuanganRole = Role::findByName('AdminKeuangan');
        $user->assignRole($adminkeuanganRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'ManagerUser',
            'username' => 'manager',
            'email' => 'manager@example.com',
            'phone' => '085669920908',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $managerRole = Role::findByName('Manager');
        $user->assignRole($managerRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'AdminSDMUser',
            'username' => 'adminsdm',
            'email' => 'adminsdm@example.com',
            'phone' => '085669920907',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $adminsdmRole = Role::findByName('AdminSDM');
        $user->assignRole($adminsdmRole);
    }
}
