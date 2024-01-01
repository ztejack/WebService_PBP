<?php

namespace App\Models;

use App\Http\Controllers\WEB\EmployeController;
use App\Http\Controllers\WEB\GajiController;
use App\Models\Gaji\Absensi;
use App\Models\Gaji\Gaji;
use App\Models\Gaji\GajiLembur;
use App\Models\Gaji\GajiRapel;
use App\Models\Gaji\GajiParamTnjng;
use App\Models\Gaji\GajiSlip;
use App\Models\Gaji\GajiSubmit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

use function PHPUnit\Framework\isNull;

class Employe extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nip',
        'nik',
        'npwp',
        'ttl',
        'address',
        'ktp_address',
        'gender',
        'religion',
        'status',
        'status_keluarga',
        'date_start',
        'tenure',
        'user_id',
        'contract_id',
        'satker_id',
        'worklocation_id',
        'position_id',
        'golongan_id',
        'family_status_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
    public function subsatker()
    {
        return $this->belongsTo(Subsatker::class);
    }
    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
    public function worklocation()
    {
        return $this->belongsTo(WorkLocation::class, 'worklocation_id');
    }
    public function position()
    {
        return $this->belongsto(Position::class);
    }
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
    public function familystatus()
    {
        return $this->belongsTo(FamilyStatus::class, 'family_status_id');
    }
    public function gaji()
    {
        return $this->hasOne(Gaji::class, 'employe_id');
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
    public function lembur()
    {
        return $this->hasMany(GajiLembur::class);
    }
    public function rapel()
    {
        return $this->hasMany(GajiRapel::class);
    }

    public function slip()
    {
        return $this->hasMany(GajiSlip::class, 'employe_id');
    }
    public function gajisubmit()
    {
        return $this->belongsToMany(GajiSubmit::class, 'gaji_slips');
    }
    // public function gajisubmit()
    // {
    //     return $this->hasMany(GajiSubmit::class, 'gaji_slips');
    // }
    public function getcurrentlembur()
    {
        $lemburs = $this->lembur()->where('date', '>=', now()->format('m Y'))->first();

        if ($lemburs === null) {
            $lemburs = ['jumlah' => 0];
            return (object)$lemburs;
        }
        // $lembur = $lemburs == null ? 0 : $lemburs->jumlah;
        return (object)$lemburs;
    }
    public function getcurrentrapel()
    {
        $rapels = $this->rapel()->where('date', '>=', now()->format('m Y'))->first();

        if ($rapels === null) {
            $rapels = ['jumlah' => 0];
            return (object)$rapels;
        }
        // $lembur = $rapels == null ? 0 : $rapels->jumlah;
        return (object)$rapels;
    }
    public function getcurrentabsensi()
    {
        $firstDayOfMonth = now()->startOfMonth();
        $lastDayOfMonth = now()->endOfMonth();

        $absensi =  $this->absensi()
            ->whereBetween('date', [$firstDayOfMonth, $lastDayOfMonth])
            ->get();
        // return $absensi->isNotEmpty() ? $absensi : null;
        // Check if absensi is null or empty, and return a default value
        if ($absensi === null) {
            $absensi = ['kosong' => 0, 'perjalanan' => 0, 'sakit' => 0, 'terlambat' => 0];
            return (object)$absensi; // Default value when absensi is null or empty
        }

        // Calculate the sum of the 'sakit' field
        $totalSakit = $absensi->sum('sakit');
        $totalKosong = $absensi->sum('kosong');
        $totalTerlambat = $absensi->sum('terlambat');
        $totalPerjalanan = $absensi->sum('perjalanan');
        $absensi = ['kosong' => $totalKosong, 'perjalanan' => $totalPerjalanan, 'sakit' => $totalSakit, 'terlambat' => $totalTerlambat];

        return (object)$absensi;
    }
    // error 27/11/2023
    public function gajisubmitcheck($gajiSubmitid)
    {
        if ($this->gajisubmit()) {
            // dd($this->gajisubmit);
            if ($this->gajisubmit()->where('gaji_submits.id', $gajiSubmitid)->exists()) {
                return true;
            };
            return false;
        };
        return false;
    }
    public function payrolcheck()
    {
        if ($this->contract->contract == 'DIREKSI') {
            $gaji = $this->gaji()->get()->first();
            $gaji_pokok = $gaji->gapok;
            if ($gaji_pokok > 0) {
                return true;
            }
        } elseif ($this->contract->contract != 'DIREKSI') {
            $gaji = $this->gaji()->get()->first();
            $gaji_pokok = $gaji->gapok;
            $tunjangan_jabatan = $gaji->tnj_jabatan;
            if ($gaji_pokok > 0) {
                if ($tunjangan_jabatan > 0) {
                    return true;
                }
                return false;
            }
            return false;
        }
    }


    public function absensiForCurrentMonth()
    {
        $firstDayOfMonth = now()->startOfMonth();
        $lastDayOfMonth = now()->endOfMonth();

        $absensi =  $this->absensi()
            ->whereBetween('date', [$firstDayOfMonth, $lastDayOfMonth])
            ->get();
        // return $absensi->isNotEmpty() ? $absensi : null;
        // Check if absensi is null or empty, and return a default value
        if ($absensi === null || $absensi->isEmpty()) {
            return 0; // Default value when absensi is null or empty
        }

        // Calculate the sum of the 'sakit' field
        $totalSakit = $absensi->sum('sakit');
        $totalKosong = $absensi->sum('kosong');
        $totalTerlambat = $absensi->sum('terlambat');
        $totalPerjalanan = $absensi->sum('perjalanan');
        $total = array_sum([$totalKosong, $totalPerjalanan, $totalSakit, $totalTerlambat]);

        return $total;
    }
    public function gajicount()
    {
        if(isNull())
        $gaji = $this->gaji()->get()->first();
        if ($this->contract->contract == 'DIREKSI') {
            $return = (object)[
                'total' => $gaji->total_gaji,
                'tnj_lain' => $gaji->tnj_lain,
                'tnj_perumahan' => $gaji->tnj_perumahan,
                'tnj_taspen' => $gaji->tnj_taspen,
                'tnj_dana_pensiun' => $gaji->tnj_dana_pensiun,
                'tnj_hari_tua_p' => $gaji->tnj_hari_tua_p,
                'tnj_jmn_hari_tua_p' => $gaji->tnj_jmn_hari_tua_p,
                'tnj_pph21' => $gaji->tnj_pph21,
                'tnj_bpjs_tk' => $gaji->tnj_bpjs_tk,
                'tnj_bpjs_kes' => $gaji->tnj_bpjs_kes,
                'tnj_simponi' => $gaji->tnj_simponi,
                'pot_serikat_pegawai_ba' => $gaji->pot_serikat_pegawai_ba,
                'pot_koperasi' => $gaji->pot_koperasi,
                'pot_lazis' => $gaji->pot_lazis,
                'pot_dana_pensiun' => $gaji->pot_dana_pensiun,
                'pot_premi_jht' => $gaji->pot_premi_jht,
                'pot_tht' => $gaji->pot_koperasi,
                'pot_taspen' => $gaji->pot_taspen,
                'pot_pph21' => $gaji->pot_pph21,
                'pot_bpjs_kes' => $gaji->pot_bpjs_kes,
                'pot_simponi' => $gaji->pot_simponi,
                'pot_lain' => $gaji->pot_lain,
                // 'pot_pph21' => $gaji->pot_pph21,
                // 'pot_pph21' => $gaji->pot_pph21,
            ];
            return $return;
        }

        $gaji_pokok = $gaji->gapok;
        $tunjangan_ahli = $gaji->tnj_ahli;
        $tunjangan_jabatan = $gaji->tnj_jabatan;
        $tunjangan_lapangan = $gaji->tnj_lapangan;
        $tunjangan_lain = $gaji->tnj_lain;
        $total1 = array_sum([$gaji_pokok, $tunjangan_ahli, $tunjangan_jabatan]);


        $param_tnj = GajiParamTnjng::where('position_id', $this->position->id)->where('golongan_id', $this->golongan->id)->first();

        $tnj_makan = $param_tnj == null ? 0 : $param_tnj->tnj_makan;
        $tnj_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
        $tnj_transport = $param_tnj == null ? 0 : $param_tnj->tnj_transport;
        $tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;

        $sum_tnj_makan = $param_tnj == null ? 0 : ($param_tnj->tnj_makan * 24);
        $sum_tnj_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
        $sum_tnj_transport = $param_tnj == null ? 0 : ($param_tnj->tnj_transport * 24);
        $sum_tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;
        $GajiController = new GajiController();
        $bpjs_count = $GajiController->bpjs_cout($gaji_pokok, $total1, $param_tnj);

        $lemburs = $this->getcurrentlembur();
        // dd($this->lembur);
        $lembur = $lemburs == null ? 0 : $lemburs->jumlah;

        $rapels = $this->getcurrentrapel();
        // dd($this->rapel);
        $rapel = $rapels == null ? 0 : $rapels->jumlah;

        $lemburcount = $this->lembur;
        $rapelcount = $this->rapel;
        $total2 = array_sum([
            $sum_tnj_makan,
            $sum_tnj_perumahan,
            $sum_tnj_shift,
            $sum_tnj_transport,
            $bpjs_count->tnj_bpjs_tk_P,
            $bpjs_count->tnj_bpjs_kes_P,
            $tunjangan_lapangan,
            $tunjangan_lain,
            $lembur,
            $rapel
        ]);

        $absens = $this->absensi->where('date', '>=', now()->format('m Y'));
        $potongan_lainnya = $GajiController->absensi_count($absens, $tnj_makan, $tnj_transport);

        $total3 = array_sum([
            // $bpjs_count->tnj_bpjs_tk_P,
            // $bpjs_count->tnj_bpjs_kes_P,
            $bpjs_count->pot_bpjs_tk_E,
            $bpjs_count->pot_bpjs_kes_E,
            $potongan_lainnya->pot_sakit,
            $potongan_lainnya->pot_kosong,
            $potongan_lainnya->pot_terlambat,
            $potongan_lainnya->pot_perjalanan
        ]);
        $total = 0;
        if ($total1 != 0) {
            $total = array_sum([$total1, $total2]) - $total3;
            $return = (object)[
                'total' => round($total),
                'tnj_makan' => $sum_tnj_makan,
                'tnj_perumahan' => $sum_tnj_perumahan,
                'tnj_transport' => $sum_tnj_transport,
                'tnj_lapangan' => $tunjangan_lapangan,
                'tnj_lain' => $tunjangan_lain,
                'lembur' => $lembur,
                'rapel' => $rapel,
                'tnj_shift' => $sum_tnj_shift,
                'bpjs_var' => $bpjs_count,
                'potongan_lainnya' => $potongan_lainnya,
            ];
            return $return;
            // dd($return);
        }
        $return = (object)[
            'total' => 0,
            'tnj_makan' => 0,
            'tnj_perumahan' => 0,
            'tnj_transport' => 0,
            'tnj_lapangan' => 0,
            'tnj_lain' => 0,
            'tnj_shift' => 0,
            'lembur' => 0,
            'rapel' => 0,
            'bpjs_var' => $bpjs_count,
            'potongan_lainnya' => $potongan_lainnya,
        ];
        // dd($return);

        return $return;
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4()->getHex();
            // $model->date_start = $model->date_start ?? now();
        });
        self::created(function ($model) {
            $model->gaji()->create();
        });
    }
}
