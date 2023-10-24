<?php

namespace App\Models\Gaji;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamBPSJ extends Model
{
    use HasFactory;
    protected $fillable = [
        'jp_E',
        'jht_E',

        'jp_P',
        'jht_P',
        'jkk_P',
        'jkm_P',

        'kes_E',
        'kes_P',
        'kes_max'
    ];
}
