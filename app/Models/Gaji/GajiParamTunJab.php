<?php

namespace App\Models\Gaji;

use App\Models\Employe;
use App\Models\Golongan;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiParamTunJab extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gaji_fungsional',
        'gaji_struktural',
        'golongan_id',
        'position_id'
    ];
    public function employee()
    {
        return $this->belongsTo(Employe::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
}
