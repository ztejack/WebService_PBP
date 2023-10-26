<?php

namespace App\Models\Gaji;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamBPSJ extends Model
{
    use HasFactory;
    protected $fillable = [
        'jp_E',
        'jp_P',
        'gaji_max_jp',

        'jht_E',
        'jht_P',
        'jkk_P',
        'jkm_P',

        'kes_E',
        'kes_P',
        'kes_max',
        'kes_min',

        'status',
    ];
}
