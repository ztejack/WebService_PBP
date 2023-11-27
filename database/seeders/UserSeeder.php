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
        $user->update(['status' => true]);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'Tomi ADM',
            'username' => 'adminuser',
            'email' => 'adminuser@example.com',
            'phone' => '085669920000',
            'password' => '$2y$10$f/cQPkLWDFE1U472RSFN0.hr.WEU2aP5kJrFD6vujDgEHWDNV/mU6', //default PBP2023@ADM
        ]);
        $adminRole = Role::findByName('Admin');
        $user->assignRole($adminRole);
        $user->employee->update(['status' => true]);
        $user->update(['status' => true]);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'Tomi Karyawan',
            'username' => 'employe',
            'email' => 'employe@example.com',
            'phone' => '085669920909',
            'password' => '$2y$10$C3/KCSiV5eIMaNHCv/2zFuF2OTofdVGMhkeljSWY7ygSFzCszGVAq', //PBP2023@Us
        ]);
        $employeRole = Role::findByName('Employe');
        $user->assignRole($employeRole);
        $user->employee->update(['status' => true]);
        $user->update(['status' => true]);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'GuestUser',
            'username' => 'guest',
            'email' => 'guest@example.com',
            'phone' => '085669920901',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $user->assignRole($employeRole);
        $user->employee->update(['status' => true]);
        $user->update(['status' => true]);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'Tomi Manager',
            'username' => 'manager',
            'email' => 'manager@example.com',
            'phone' => '085669920908',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $managerRole = Role::findByName('Manager');
        $user->assignRole($managerRole);
        $user->employee->update(['status' => true]);
        $user->update(['status' => true]);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'Tomi AsistenManager',
            'username' => 'asistenmager',
            'email' => 'asistenmanager@example.com',
            'phone' => '085669920907',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $asistenmanagerRole = Role::findByName('AsistenManager');
        $user->employee->update(['status' => true]);
        $user->update(['status' => true]);
        $user->assignRole($asistenmanagerRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'Tomi GeneralManager',
            'username' => 'generalmanager',
            'email' => 'generalmanager@example.com',
            'phone' => '085869920907',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $generalmanagerRole = Role::findByName('GeneralManager');
        $user->employee->update(['status' => true]);
        $user->update(['status' => true]);
        $user->assignRole($generalmanagerRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'Tomi Supervisor',
            'username' => 'supervisor',
            'email' => 'supervisor@example.com',
            'phone' => '085839920907',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $supervisorRole = Role::findByName('Supervisor');
        $user->employee->update(['status' => true]);
        $user->update(['status' => true]);
        $user->assignRole($supervisorRole);

        $user = User::create([
            'uuid' => Uuid::uuid4()->getHex(),
            'name' => 'Tomi DirekturUtama',
            'username' => 'direkturutama',
            'email' => 'dirut@example.com',
            'phone' => '085889920907',
            'password' => '$2y$10$RjPA6GkNgGKTc1kAa1th1OcajKZQ7Y1gBshqL.B0zPnOMjZ3IMJpe', //PBP2023@Us
        ]);
        $dirutRole = Role::findByName('DirekturUtama');
        $user->employee->update(['status' => true]);
        $user->update(['status' => true]);
        $user->assignRole($dirutRole);
    }
}
