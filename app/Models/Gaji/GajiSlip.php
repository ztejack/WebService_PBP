<?php

namespace App\Models\Gaji;

use App\Models\Employe;
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
        'tnj_lapangan',
        'tnj_ahli',
        'total_tnj_makan',
        'tnj_perumahan',
        'total_tnj_shift',
        'total_tnj_transport',
        'tnj_lapangan',
        'lembur',

        'tnj_bpjs_tk',
        'tnj_bpjs_kes',
        'pot_bpjs_tk',
        'pot_bpjs_kes',
        'pot_sakit',
        'pot_kosong',
        'pot_terlambat',
        'pot_perjalanan',
        'total',

        'status',
        'employe_id',
        'gaji_submit_id'
    ];
    public function gajisubmit()
    {
        return $this->belongsTo(GajiSubmit::class, 'gaji_submit_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
}
