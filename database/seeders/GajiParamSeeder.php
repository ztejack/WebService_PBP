<?php

namespace Database\Seeders;

use App\Models\Gaji\GajiParamTnjng;
use App\Models\Gaji\GajiParamTunJab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GajiParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1A
        GajiParamTunJab::create([
            'gaji_fungsional' => 7500000,
            'gaji_struktural' => 8750000,
            'position_id' => 1,
            'golongan_id' => 1,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 7500000,
            'gaji_struktural' => 8750000,
            'position_id' => 2,
            'golongan_id' => 1,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 7500000,
            'gaji_struktural' => 8750000,
            'position_id' => 3,
            'golongan_id' => 1,
        ]);
        // 1B
        GajiParamTunJab::create([
            'gaji_fungsional' => 7100000,
            'gaji_struktural' => 8500000,
            'position_id' => 1,
            'golongan_id' => 2,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 7100000,
            'gaji_struktural' => 8500000,
            'position_id' => 2,
            'golongan_id' => 2,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 7100000,
            'gaji_struktural' => 8500000,
            'position_id' => 3,
            'golongan_id' => 2,
        ]);
        // 1C
        GajiParamTunJab::create([
            'gaji_fungsional' => 6600000,
            'gaji_struktural' => 8000000,
            'position_id' => 1,
            'golongan_id' => 3,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 6600000,
            'gaji_struktural' => 8000000,
            'position_id' => 2,
            'golongan_id' => 3,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 6600000,
            'gaji_struktural' => 8000000,
            'position_id' => 3,
            'golongan_id' => 3,
        ]);
        // 2A
        GajiParamTunJab::create([
            'gaji_fungsional' => 5350000,
            'gaji_struktural' => 7500000,
            'position_id' => 4,
            'golongan_id' => 4,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 5350000,
            'gaji_struktural' => 7500000,
            'position_id' => 5,
            'golongan_id' => 4,
        ]);
        // 2B
        GajiParamTunJab::create([
            'gaji_fungsional' => 4850000,
            'gaji_struktural' => 6000000,
            'position_id' => 4,
            'golongan_id' => 5,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 4850000,
            'gaji_struktural' => 6000000,
            'position_id' => 5,
            'golongan_id' => 5,
        ]);
        // 2C
        GajiParamTunJab::create([
            'gaji_fungsional' => 4500000,
            'gaji_struktural' => 5400000,
            'position_id' => 4,
            'golongan_id' => 6,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 4500000,
            'gaji_struktural' => 5400000,
            'position_id' => 5,
            'golongan_id' => 6,
        ]);
        // 3A
        GajiParamTunJab::create([
            'gaji_fungsional' => 4000000,
            'gaji_struktural' => 4250000,
            'position_id' => 7,
            'golongan_id' => 7,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 4000000,
            'gaji_struktural' => 4250000,
            'position_id' => 5,
            'golongan_id' => 7,
        ]);
        // 3B
        GajiParamTunJab::create([
            'gaji_fungsional' => 3750000,
            'gaji_struktural' => 4000000,
            'position_id' => 7,
            'golongan_id' => 8,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 3750000,
            'gaji_struktural' => 4000000,
            'position_id' => 5,
            'golongan_id' => 8,
        ]);
        // 3C
        GajiParamTunJab::create([
            'gaji_fungsional' => 3500000,
            'gaji_struktural' => 3750000,
            'position_id' => 7,
            'golongan_id' => 9,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 3500000,
            'gaji_struktural' => 3750000,
            'position_id' => 5,
            'golongan_id' => 9,
        ]);
        // 4A
        GajiParamTunJab::create([
            'gaji_fungsional' => 2500000,
            'gaji_struktural' => 2750000,
            'position_id' => 9,
            'golongan_id' => 10,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 2500000,
            'gaji_struktural' => 2750000,
            'position_id' => 7,
            'golongan_id' => 10,
        ]);
        // 4B
        GajiParamTunJab::create([
            'gaji_fungsional' => 2000000,
            'gaji_struktural' => 2500000,
            'position_id' => 9,
            'golongan_id' => 11,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 2000000,
            'gaji_struktural' => 2500000,
            'position_id' => 7,
            'golongan_id' => 11,
        ]);
        // 4C
        GajiParamTunJab::create([
            'gaji_fungsional' => 2000000,
            'gaji_struktural' => 2250000,
            'position_id' => 9,
            'golongan_id' => 12,
        ]);
        GajiParamTunJab::create([
            'gaji_fungsional' => 2000000,
            'gaji_struktural' => 2250000,
            'position_id' => 7,
            'golongan_id' => 12,
        ]);
        // 5A
        GajiParamTunJab::create([
            'gaji_fungsional' => 1750000,
            'gaji_struktural' => 0,
            'position_id' => 10,
            'golongan_id' => 13,
        ]);
        // 5B
        GajiParamTunJab::create([
            'gaji_fungsional' => 1500000,
            'gaji_struktural' => 0,
            'position_id' => 10,
            'golongan_id' => 14,
        ]);
        // 5C
        GajiParamTunJab::create([
            'gaji_fungsional' => 1250000,
            'gaji_struktural' => 0,
            'position_id' => 10,
            'golongan_id' => 15,
        ]);
        // 6A
        GajiParamTunJab::create([
            'gaji_fungsional' => 1100000,
            'gaji_struktural' => 0,
            'position_id' => 11,
            'golongan_id' => 16,
        ]);
        // 6B
        GajiParamTunJab::create([
            'gaji_fungsional' => 1000000,
            'gaji_struktural' => 0,
            'position_id' => 11,
            'golongan_id' => 17,
        ]);
        // 6C
        GajiParamTunJab::create([
            'gaji_fungsional' => 800000,
            'gaji_struktural' => 0,
            'position_id' => 11,
            'golongan_id' => 18,
        ]);

        //1A
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 3000000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 1,
            'golongan_id' => 1,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 3000000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 2,
            'golongan_id' => 1,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 3000000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 3,
            'golongan_id' => 1,
        ]);
        // 1B
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 2950000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 1,
            'golongan_id' => 2,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 2950000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 2,
            'golongan_id' => 2,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 2950000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 3,
            'golongan_id' => 2,
        ]);
        // 1C
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 2900000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 1,
            'golongan_id' => 3,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 2900000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 2,
            'golongan_id' => 3,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 85000,
            'tnj_perumahan' => 2900000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 3,
            'golongan_id' => 3,
        ]);
        // 2A
        GajiParamTnjng::create([
            'tnj_transport' => 70000,
            'tnj_perumahan' => 2875000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 4,
            'golongan_id' => 4,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 70000,
            'tnj_perumahan' => 2875000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 5,
            'golongan_id' => 4,
        ]);
        // 2B
        GajiParamTnjng::create([
            'tnj_transport' => 70000,
            'tnj_perumahan' => 2850000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 4,
            'golongan_id' => 5,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 70000,
            'tnj_perumahan' => 2850000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 5,
            'golongan_id' => 5,
        ]);
        // 2C
        GajiParamTnjng::create([
            'tnj_transport' => 70000,
            'tnj_perumahan' => 2825000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 4,
            'golongan_id' => 6,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 70000,
            'tnj_perumahan' => 2825000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 5,
            'golongan_id' => 6,
        ]);
        // 3A
        GajiParamTnjng::create([
            'tnj_transport' => 60000,
            'tnj_perumahan' => 2800000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 7,
            'golongan_id' => 7,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 60000,
            'tnj_perumahan' => 2800000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 5,
            'golongan_id' => 7,
        ]);
        // 3B
        GajiParamTnjng::create([
            'tnj_transport' => 60000,
            'tnj_perumahan' => 2600000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 7,
            'golongan_id' => 8,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 60000,
            'tnj_perumahan' => 2600000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 5,
            'golongan_id' => 8,
        ]);
        // 3C
        GajiParamTnjng::create([
            'tnj_transport' => 60000,
            'tnj_perumahan' => 2400000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 7,
            'golongan_id' => 9,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 60000,
            'tnj_perumahan' => 2400000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 5,
            'golongan_id' => 9,
        ]);
        // 4A
        GajiParamTnjng::create([
            'tnj_transport' => 45000,
            'tnj_perumahan' => 2000000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 9,
            'golongan_id' => 10,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 45000,
            'tnj_perumahan' => 2000000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 7,
            'golongan_id' => 10,
        ]);
        // 4B
        GajiParamTnjng::create([
            'tnj_transport' => 45000,
            'tnj_perumahan' => 1750000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 9,
            'golongan_id' => 11,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 45000,
            'tnj_perumahan' => 1750000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 7,
            'golongan_id' => 11,
        ]);
        // 4C
        GajiParamTnjng::create([
            'tnj_transport' => 45000,
            'tnj_perumahan' => 1500000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 9,
            'golongan_id' => 12,
        ]);
        GajiParamTnjng::create([
            'tnj_transport' => 45000,
            'tnj_perumahan' => 1500000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 7,
            'golongan_id' => 12,
        ]);
        // 5A
        GajiParamTnjng::create([
            'tnj_transport' => 40000,
            'tnj_perumahan' => 1250000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 10,
            'golongan_id' => 13,
        ]);
        // 5B
        GajiParamTnjng::create([
            'tnj_transport' => 40000,
            'tnj_perumahan' => 1000000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 10,
            'golongan_id' => 14,
        ]);
        // 5C
        GajiParamTnjng::create([
            'tnj_transport' => 40000,
            'tnj_perumahan' => 900000,
            'tnj_makan' => 40000,
            'tnj_shift' => 0,
            'position_id' => 10,
            'golongan_id' => 15,
        ]);
        // 6A
        GajiParamTnjng::create([
            'tnj_transport' => 35000,
            'tnj_perumahan' => 800000,
            'tnj_makan' =>35000,
            'tnj_shift' => 0,
            'position_id' => 11,
            'golongan_id' => 16,
        ]);
        // 6B
        GajiParamTnjng::create([
            'tnj_transport' => 35000,
            'tnj_perumahan' => 700000,
            'tnj_makan' => 35000,
            'tnj_shift' => 0,
            'position_id' => 11,
            'golongan_id' => 17,
        ]);
        // 6C
        GajiParamTnjng::create([
            'tnj_transport' => 35000,
            'tnj_perumahan' => 600000,
            'tnj_makan' => 35000,
            'tnj_shift' => 0,
            'position_id' => 11,
            'golongan_id' => 18,
        ]);
    }
}
