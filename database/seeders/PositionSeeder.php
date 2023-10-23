<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Golongan;
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
            'position' => 'Direktur'
        ]);
        Position::create([
            'position' => 'Direktur Utama'
        ]);
        Position::create([
            'position' => 'Manager'
        ]);
        Position::create([
            'position' => 'General Manager'
        ]);
        Position::create([
            'position' => 'Assiten Manager'
        ]);
        Position::create([
            'position' => 'Staff'
        ]);
        Position::create([
            'position' => 'Staff'
        ]);

        // Contract
        Contract::create([
            'contract' => "Tetap"
        ]);
        Contract::create([
            'contract' => "PKWT"
        ]);

        // Golongan
        Golongan::create([
            'golongan' => "IA"
        ]);
        Golongan::create([
            'golongan' => "IB"
        ]);
        Golongan::create([
            'golongan' => "IC"
        ]);
        Golongan::create([
            'golongan' => "IIA"
        ]);
        Golongan::create([
            'golongan' => "IIB"
        ]);
        Golongan::create([
            'golongan' => "IIC"
        ]);
        Golongan::create([
            'golongan' => "IIIA"
        ]);
        Golongan::create([
            'golongan' => "IIIB"
        ]);
        Golongan::create([
            'golongan' => "IIIC"
        ]);
        Golongan::create([
            'golongan' => "IVA"
        ]);
        Golongan::create([
            'golongan' => "IVB"
        ]);
        Golongan::create([
            'golongan' => "IVC"
        ]);
    }
}
