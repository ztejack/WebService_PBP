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

        'tnj_makan',
        'tnj_bantuan_perumahan',
        'tnj_shift',
        'tnj_transport',

        'tnj_lain',
        'lembur',
        'rapel',

        'tnj_cuti', //gaji1
        'ikp',
        'bsc',
        'thr',
        'ireq',

        'tnj_perumahan',
        'tnj_dana_pensiun',
        'tnj_simmode',
        'tnj_pajak',

        'tnj_bpjs_jkm',
        'tnj_bpjs_jht',
        'tnj_bpjs_jp',

        'tnj_bpjs_tk',
        'tnj_bpjs_kes',
        'pot_bpjs_tk',
        'pot_bpjs_kes',

        'pot_bpjs_jkm',
        'pot_bpjs_jht',
        'pot_bpjs_jp',

        'pot_serikat_pegawai_ba',
        'pot_lazis',
        'pot_dana_pensiun',
        'pot_simmode',
        'pot_koperasi',
        'pot_pajak',
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
