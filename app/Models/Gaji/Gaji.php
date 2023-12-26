<?php

namespace App\Models\Gaji;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gapok',
        'tnj_ahli',
        'total_gaji',
        'tnj_jabatan',
        'tnj_lapangan',
        'tnj_lain',
        'type_tunjab',

        // direksi
        'tnj_perumahan',
        'tnj_bantuan_perumahan',
        'tnj_taspen',
        'tnj_dana_pensiun',
        'tnj_hari_tua_p',
        'tnj_jmn_hari_tua_p',
        'tnj_pph21',
        'tnj_bpjs_tk',
        'tnj_bpjs_kes',
        'tnj_simponi',

        'pot_serikat_pegawai_ba',
        'pot_koperasi',
        'pot_lazis',
        'pot_dana_pensiun',
        'pot_premi_jht',
        'pot_tht',
        'pot_taspen',
        'pot_pph21',
        'pot_bpjs_tk',
        'pot_bpjs_kes',
        'pot_simponi',
        'pot_lain',
        'employe_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
    public function tunjangan()
    {
        return $this->belongsTo(Tunjangan_lain::class);
    }
}
