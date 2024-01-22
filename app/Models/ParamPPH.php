<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamPPH extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'biaya_jabatan',
        'jumlah_kategori_pertama',
        'persentase_kategori_pertama',
        'pengurang_kategori_pertama',

        'jumlah_kategori_kedua',
        'persentase_kategori_kedua',
        'pengurang_kategori_kedua',

        'jumlah_kategori_ketiga',
        'persentase_kategori_ketiga',
        'pengurang_kategori_ketiga',

        'jumlah_kategori_keempat',
        'persentase_kategori_keempat',
        'pengurang_kategori_keempat',

        'jumlah_kategori_kelima',
        'persentase_kategori_kelima',
        'pengurang_kategori_kelima',
    ];
}
