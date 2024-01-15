<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\FamilyStatus;
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
        // 12
        Position::create([
            'position' => 'Employe'
        ]);

        // Contract
        Contract::create([
            'contract' => "TETAP"
        ]);
        Contract::create([
            'contract' => "PKWT"
        ]);
        Contract::create([
            'contract' => "PKWTT"
        ]);
        Contract::create([
            'contract' => "DIREKSI"
        ]);
        Contract::create([
            'contract' => "KOMISARIS"
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
        Golongan::create([
            'golongan' => "N/N"
        ]);
        // ^19

        // Family Status
        FamilyStatus::create([
            'familystatus' => "K/0"
        ]);
        FamilyStatus::create([
            'familystatus' => "K/1"
        ]);
        FamilyStatus::create([
            'familystatus' => "K/2"
        ]);
        FamilyStatus::create([
            'familystatus' => "K/3"
        ]);
        // 5
        FamilyStatus::create([
            'familystatus' => "TK/0"
        ]);
        FamilyStatus::create([
            'familystatus' => "TK/1"
        ]);
        FamilyStatus::create([
            'familystatus' => "TK/2"
        ]);
        FamilyStatus::create([
            'familystatus' => "TK/3"
        ]);
    }
}
