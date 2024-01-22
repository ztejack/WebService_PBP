<?php

namespace App\Models\Gaji;

use App\Http\Controllers\WEB\GajiController;
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
        'tnj_shift',
        'tnj_transport',
        'tnj_makan',
        'tnj_bantuan_perumahan',

        'tnj_perumahan',
        'tnj_dana_pensiun',
        'tnj_simmode',
        'tnj_bpjs_tk',
        'tnj_bpjs_jkm',
        'tnj_bpjs_jht',
        'tnj_bpjs_jp',
        'tnj_bpjs_kes',
        'tnj_pajak',

        'pot_serikat_pegawai_ba',
        'pot_lazis',
        'pot_dana_pensiun',
        'pot_simmode',
        'pot_koperasi',
        'pot_bpjs_tk',
        'pot_bpjs_jkm',
        'pot_bpjs_jht',
        'pot_bpjs_jp',
        'pot_bpjs_kes',
        'pot_pajak',
        'pot_lain',

        'bpjs_status',
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


    protected static function boot()
    {
        parent::boot();
        // Listen to the saving event
        static::saving(function ($gaji) {
            // Check any condition you need to update the Gaji model
            if ($gaji->employee->contract->contract !== 'DIREKSI') {
                if ($gaji->needsBPJSUpdate()) {
                    // Update the Gaji model
                    $gaji->update([
                        'tnj_bpjs_tk' => false,
                        'tnj_bpjs_kes' => false,
                        'pot_bpjs_tk' => false,
                        'pot_bpjs_kes' => false
                    ]);
                }
            }
        });
    }

    // Method to check if an update is necessary
    public function needsBPJSUpdate()
    {
        // Add your logic here to determine if an update is necessary
        // check if 'some_column' is not already set to 0
        return $this->bpjs_status === false;
    }
}
