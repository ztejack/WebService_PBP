<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\Subsatker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satker::create([
            'satker' => 'Guest'
        ]);
        Subsatker::create([
            'subsatker' => 'Guest',
            'id_satker' => 1,
        ]);
    }
}
