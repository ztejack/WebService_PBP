<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'Direktur'
        ]);
        Position::create([
            'name' => 'Direktur Utama'
        ]);
        Position::create([
            'name' => 'Manager'
        ]);
        Position::create([
            'name' => 'General Manager'
        ]);
        Position::create([
            'name' => 'Assiten Manager'
        ]);
        Position::create([
            'name' => 'Staff'
        ]);
        Position::create([
            'name' => 'Staff'
        ]);
    }
}
