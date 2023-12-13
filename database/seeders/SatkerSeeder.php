<?php

namespace Database\Seeders;

use App\Models\Satker;
use App\Models\Subsatker;
use App\Models\WorkLocation;
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
        Satker::create([
            'satker' => 'Operasi'
        ]);
        Satker::create([
            'satker' => 'Keuangan'
        ]);
        Satker::create([
            'satker' => 'SDM & Umum'
        ]);
        Satker::create([
            'satker' => 'Crew'
        ]);
        Satker::create([
            'satker' => 'Kuala Tanjung'
        ]);
        Subsatker::create([
            'subsatker' => 'Guest',
            'id_satker' => 1,
        ]);

        // WorkLocation
        WorkLocation::create([
            'location' => 'Tarahan'
        ]);
        WorkLocation::create([
            'location' => 'Kuala Tanjung'
        ]);
        WorkLocation::create([
            'location' => 'Direksi'
        ]);
    }
}
