<?php

namespace App\Models\Gaji;

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
        'status',
        'employe_id',
        'submit_id'
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
