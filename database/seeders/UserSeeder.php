<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            'name' => 'SuperUser',
            'username' => 'superuser',
            'email' => 'superuser@example.com',
            'phone' => '085669920357',
            'password' => bcrypt('123456789'),
        ]);
        $superAdminRole = Role::findByName('SuperUser');
        $user->assignRole($superAdminRole);
    }
}
