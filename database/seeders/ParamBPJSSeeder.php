<?php

namespace Database\Seeders;

use App\Models\Gaji\ParamBPSJ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParamBPJSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParamBPSJ::create([
            'jp_E' => 1,
            'jp_P' => 2,

            'gaji_max_jp' => 9000000,

            'jht_E' => 2,
            'jht_P' => 3.7,
            'jkk_P' => 0.89,
            'jkm_P' => 0.3,

            'tk_E' => 3,
            'tk_P' => 6.89,

            'kes_E' => 1,
            'kes_P' => 4,
            'kes_max' => 12000000,
            'kes_min' => 4100000,
            'status' => true
        ]);
    }
}
