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
        'tnj_lain',
        'lembur',
        'rapel',

        'tnj_cuti', //gaji1
        'ikp',
        'bsc',
        'thr',
        'ireq',

        'tnj_bantuan_perumahan',
        'tnj_taspen',
        'tnj_dana_pensiun',
        'tnj_hari_tua_p',
        'tnj_jmn_hari_tua_p',
        'tnj_pph21',
        'tnj_simponi',

        'tnj_bpjs_tk',
        'tnj_bpjs_kes',
        'pot_bpjs_tk',
        'pot_bpjs_kes',

        'pot_serikat_pegawai_ba',
        'pot_koperasi',
        'pot_lazis',
        'pot_dana_pensiun',
        'pot_premi_jht',
        'pot_tht',
        'pot_taspen',
        'pot_pph21',
        'pot_simponi',
        'pot_lain',
        'pot_sakit',
        'pot_kosong',
        'pot_terlambat',
        'pot_perjalanan',

        'total',

        'status',
        'employe_id',
        'gaji_submit_id'
    ];
    protected $casts = [
        'date' => 'date:Y-m-d',
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
