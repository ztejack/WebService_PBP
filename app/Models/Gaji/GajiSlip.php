<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiSlip extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'gapok',
        'tnj_jabatan',
        'tnj_ahli',
        'total_tnj_makan',
        'tnj_perumahan',
        'total_tnj_shift',
        'total_tnj_transport',
        'aprv_1',
        'aprv_2',
        'employe_id',
        'aprove_id'
    ];
    public function employee()
    {
        return $this->belongsTo(Employe::class);
    }
    public function aprove()
    {
        return $this->hasOne(Aprove::class);
    }
}
