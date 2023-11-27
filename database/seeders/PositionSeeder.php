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
        // 1
        Position::create([
            'position' => 'General Manager'
        ]);
        // 2
        Position::create([
            'position' => 'Senior Manager'
        ]);
        // 3
        Position::create([
            'position' => 'Fungsional Utama'
        ]);

        // 4
        Position::create([
            'position' => 'Manager'
        ]);
        // 5
        Position::create([
            'position' => 'Fungsional Madya'
        ]);
        // 6
        Position::create([
            'position' => 'Fungsional Muda'
        ]);
        // 7
        Position::create([
            'position' => 'Fungsional Pratama'
        ]);
        // 8
        Position::create([
            'position' => 'Assiten Manager'
        ]);
        // 9
        Position::create([
            'position' => 'Penyedia'
        ]);
        // 10
        Position::create([
            'position' => 'Pelaksana Terampil'
        ]);
        // 11
        Position::create([
            'position' => 'Pelaksana'
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
        // ^6
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
        // ^12
        Golongan::create([
            'golongan' => "VA"
        ]);
        Golongan::create([
            'golongan' => "VB"
        ]);
        Golongan::create([
            'golongan' => "VC"
        ]);
        Golongan::create([
            'golongan' => "VIA"
        ]);
        Golongan::create([
            'golongan' => "VIB"
        ]);
        Golongan::create([
            'golongan' => "VIC"
        ]);
        // ^18
    }
}
