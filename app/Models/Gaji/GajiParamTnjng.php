<?php

namespace App\Models\Gaji;

use App\Models\Employe;
use App\Models\Golongan;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiParamTnjng extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tnj_transport',
        'tnj_perumahan',
        'tnj_makan',
        'tnj_shift',
        'golongan_id',
        'position_id',
        // 'tnj_bpjs_tk',
        // 'tnj_bpjs_kes'
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
