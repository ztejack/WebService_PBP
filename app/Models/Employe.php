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
        // $lemburs = $this->lembur()->where('date', '>=', now()->format('m Y'))->first();
        $lemburs = $this->lembur()->whereYear('date', '>=', now()->year)
            ->orWhere(function ($query) {
                $query->whereYear('date', now()->year)
                    ->whereMonth('date', '>=', now()->month);
            })->get()->first();
        // dd($lemburs);
        if ($lemburs === null) {
            $lemburs = ['jumlah' => 0];
            return (object)$lemburs;
        }
        // $lembur = $lemburs == null ? 0 : $lemburs->jumlah;
        return (object)$lemburs;
    }
    public function getcurrentrapel()
    {
        $rapels = $this->rapel()->whereYear('date', '>=', now()->year)
            ->orWhere(function ($query) {
                $query->whereYear('date', now()->year)
                    ->whereMonth('date', '>=', now()->month);
            })->get()->first();
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
    public function pph21count()
    {
        if ($this->contract->contract != 'DIREKSI' && $this->contract->contract != 'KOMISARIS') {
            $ptkp = $this->familystatus->gajiparamfamily->tnj_familystatus;
            $total = $this->gaji->total_gaji;
            // dd($total);
            if ($total != false) {
                $pph21_new = 1;
                $pph = 0;
                // $resultArray = [];
                $i = 1;
                $param = ParamPPH::first();
                while ($i != 0) {
                    $i++;
                    $peng_bruto = $pph + $total;
                    $bi_jab = (($peng_bruto * 15) / 100) > $param->biaya_jabatan ? $param->biaya_jabatan : (($peng_bruto * 15) / 100);
                    $net_tahun = ($peng_bruto - $bi_jab) * 12;
                    $pkp = round($net_tahun - $ptkp, -3, PHP_ROUND_HALF_DOWN);
                    if ($pkp <= $param->jumlah_kategori_pertama) {
                        $pph21 = (($pkp * $param->persentase_kategori_pertama) / 100) - $param->pengurang_kategori_pertama;
                    } elseif ($pkp <= $param->jumlah_kategori_kedua) {
                        $pph21 = (($pkp * $param->persentase_kategori_kedua) / 100) - $param->pengurang_kategori_kedua;
                    } elseif ($pkp <= $param->jumlah_kategori_ketiga) {
                        $pph21 = (($pkp * $param->persentase_kategori_ketiga) / 100) - $param->pengurang_kategori_ketiga;
                    } elseif ($pkp <= $param->jumlah_kategori_keempat) {
                        $pph21 = (($pkp * $param->persentase_kategori_keempat) / 100) - $param->pengurang_kategori_keempat;
                    } elseif ($pkp > $param->jumlah_kategori_kelima) {
                        $pph21 = (($pkp * $param->persentase_kategori_kelima) / 100) - $param->pengurang_kategori_kelima;
                    }
                    $pph21_new = round(($pph21 / 12));
                    // $resultArray[] = [
                    //     'iteration' => $i,
                    //     'pengbruto' => $peng_bruto,
                    //     'bijab' => $bi_jab,
                    //     'net_tahun' => $net_tahun,
                    //     'ptkp' => $ptkp,
                    //     'pkp' => $pkp,
                    //     'pph21' => $pph21,
                    //     'pph_new' => $pph21_new,
                    //     'pph' => $pph
                    // ];
                    if ($pph == $pph21_new) {
                        break;
                        $i = 0;
                    }
                    $pph = $pph21_new;
                }
                // dd($resultArray);
                return $pph;
            }
            return false;
        }
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
            } else {
                return false;
            }
        } elseif ($this->contract->contract == 'KOMISARIS') {
            $gaji = $this->gaji()->get()->first();
            $gaji_pokok = $gaji->gapok;
            $tunjangan_jabatan = $gaji->tnj_jabatan;
            if ($gaji_pokok > 0) {
                return true;
            } else {
                return false;
            }
        } elseif ($this->contract->contract != 'DIREKSI' || $this->contract->contract != 'KOMISARIS') {
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
    public function tnj_check()
    {
        if ($this->contract->contract == 'DIREKSI' && $this->contract->contract == 'KOMISARIS') {
            $param_tnj = GajiParamTnjng::where('position_id', $this->position->id)->where('golongan_id', $this->golongan->id)->first();

            $tnj_makan = $param_tnj == null ? 0 : $param_tnj->tnj_makan;
            $tnj_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
            $tnj_transport = $param_tnj == null ? 0 : $param_tnj->tnj_transport;
            $tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;

            $tnj_emp_makan = $this->gaji->tnj_makan;
            $tnj_emp_bantuan_perumahan = $this->gaji->tnj_bantuan_perumahan;
            $tnj_emp_transport = $this->gaji->tnj_transport;
            $tnj_emp_shift = $this->gaji->tnj_shift;

            if ($tnj_makan != $tnj_emp_makan) {
                $this->gaji->update([
                    'tnj_makan' => $tnj_makan
                ]);
            }
            if ($tnj_perumahan != $tnj_emp_bantuan_perumahan) {
                $this->gaji->update([
                    'tnj_bantuan_perumahan' => $tnj_perumahan
                ]);
            }
            if ($tnj_transport != $tnj_emp_transport) {
                $this->gaji->update([
                    'tnj_transport' => $tnj_transport
                ]);
            }
            if ($tnj_shift != $tnj_emp_shift) {
                $this->gaji->update([
                    'tnj_shift' => $tnj_shift
                ]);
            }
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
        $gaji = $this->gaji()->get()->first();
        if ($this->contract->contract == 'DIREKSI') {
            $rapels = $this->getcurrentrapel();
            $rapel = $rapels == null ? 0 : $rapels->jumlah;
            $penghasilan =  array_sum([
                $gaji->gapok,
                $gaji->tnj_jabatan,
                $gaji->tnj_perumahan,
                $gaji->tnj_bantuan_perumahan,
                $gaji->tnj_dana_pensiun,
                $gaji->tnj_simmode,
                $gaji->tnj_bpjs_tk,
                $gaji->tnj_bpjs_jkm,
                $gaji->tnj_bpjs_jht,
                $gaji->tnj_bpjs_jp,
                $gaji->tnj_bpjs_kes,
                $gaji->tnj_pajak,
                $gaji->tnj_lain,
                $rapel,
            ]);
            $potongan =  array_sum([
                $gaji->pot_serikat_pegawai_ba,
                $gaji->pot_lazis,
                $gaji->pot_dana_pensiun,
                $gaji->pot_simmode,
                $gaji->pot_koperasi,
                $gaji->pot_bpjs_tk,
                $gaji->pot_bpjs_jkm,
                $gaji->pot_bpjs_jht,
                $gaji->pot_bpjs_jp,
                $gaji->pot_bpjs_kes,
                $gaji->pot_pajak,
                $gaji->pot_lain,
            ]);
            $total = $penghasilan - $potongan;
            $return = (object)[
                'gapok' => $gaji->gapok,
                'tunjab' => $gaji->tnj_jabatan,
                'total' => $total,
                'tnj_perumahan' => $gaji->tnj_perumahan,
                'tnj_ubp' => $gaji->tnj_bantuan_perumahan,
                'tnj_dana_pensiun' => $gaji->tnj_dana_pensiun,
                'tnj_simmode' => $gaji->tnj_simmode,
                'tnj_bpjs_tk' => $gaji->tnj_bpjs_tk,
                'tnj_bpjs_jkm' => $gaji->tnj_bpjs_jkm,
                'tnj_bpjs_jht' => $gaji->tnj_bpjs_jht,
                'tnj_bpjs_jp' => $gaji->tnj_bpjs_jp,
                'tnj_bpjs_kes' => $gaji->tnj_bpjs_kes,
                'tnj_pajak' => $gaji->tnj_pajak,
                'tnj_lain' => $gaji->tnj_lain,

                'pot_spba' => $gaji->pot_serikat_pegawai_ba,
                'pot_lazis' => $gaji->pot_lazis,
                'pot_dana_pensiun' => $gaji->pot_dana_pensiun,
                'pot_simmode' => $gaji->pot_simmode,
                'pot_koperasi' => $gaji->pot_koperasi,
                'pot_bpjs_tk' => $gaji->pot_bpjs_tk,
                'pot_bpjs_jkm' => $gaji->pot_bpjs_jkm,
                'pot_bpjs_jht' => $gaji->pot_bpjs_jht,
                'pot_bpjs_jp' => $gaji->pot_bpjs_jp,
                'pot_bpjs_kes' => $gaji->pot_bpjs_kes,
                'pot_pajak' => $gaji->pot_pajak,
                'pot_lain' => $gaji->pot_lain,

                'penghasilan' => $penghasilan,
                'potongan' => $potongan,
            ];
            return $return;
        } elseif ($this->contract->contract == 'KOMISARIS') {
            $rapels = $this->getcurrentrapel();
            $rapel = $rapels == null ? 0 : $rapels->jumlah;

            $penghasilan =  array_sum([
                $gaji->gapok,
                $gaji->tnj_jabatan,
                $gaji->tnj_bantuan_perumahan,
                $gaji->tnj_makan,
                $gaji->tnj_transport,
                $gaji->tnj_shift,
                $gaji->tnj_pajak,
                $gaji->tnj_lain,
                $rapel,
            ]);
            $potongan =  array_sum([
                $gaji->pot_pajak,
                $gaji->pot_lain,
            ]);
            $total = $penghasilan - $potongan;
            $return = (object)[
                'gapok' => $gaji->gapok,
                'tunjab' => $gaji->tnj_jabatan,
                'tnj_makan' => $gaji->tnj_makan,
                'tnj_bantuan_perumahan' => $gaji->tnj_bantuan_perumahan,
                'tnj_transport' => $gaji->tnj_transport,
                'tnj_shift' => $gaji->tnj_shift,
                'tnj_pajak' => $gaji->tnj_pajak,
                'tnj_lain' => $gaji->tnj_lain,
                'rapel' => $rapel,

                'pot_pajak' => $gaji->pot_pajak,
                'pot_lain' => $gaji->pot_lain,
                'total' => $total
            ];
            return $return;
        }
        $gaji->employee->tnj_check();
        $gaji_pokok = $gaji->gapok;
        $tunjangan_ahli = $gaji->tnj_ahli;
        $tunjangan_jabatan = $gaji->tnj_jabatan;
        $tunjangan_lapangan = $gaji->tnj_lapangan;
        $tunjangan_lain = $gaji->tnj_lain;
        $tunjangan_pajak = $gaji->tnj_pajak;
        // $tunjangan_pajak = $this->pph21count();
        $bpjs_status = $gaji->bpjs_status;
        $total1 = array_sum([$gaji_pokok, $tunjangan_ahli, $tunjangan_jabatan]);

        $param_tnj = GajiParamTnjng::where('position_id', $this->position->id)->where('golongan_id', $this->golongan->id)->first();

        $tnj_makan = $param_tnj == null ? 0 : $param_tnj->tnj_makan;
        $tnj_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
        $tnj_transport = $param_tnj == null ? 0 : $param_tnj->tnj_transport;
        $tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;

        $sum_tnj_makan = $param_tnj == null ? 0 : ($param_tnj->tnj_makan * 24);
        $sum_tnj_bantuan_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
        $sum_tnj_transport = $param_tnj == null ? 0 : ($param_tnj->tnj_transport * 24);
        $sum_tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;
        $GajiController = new GajiController();
        $bpjs_count = $GajiController->bpjs_cout($gaji_pokok, $total1, $bpjs_status);

        $lemburs = $this->getcurrentlembur();
        // dd($this->lembur);
        $lembur = $lemburs == null ? 0 : $lemburs->jumlah;

        $rapels = $this->getcurrentrapel();
        // dd($this->rapel);
        $rapel = $rapels == null ? 0 : $rapels->jumlah;

        // $lemburcount = $this->lembur;
        // $rapelcount = $this->rapel;
        $total2 = array_sum([
            $sum_tnj_makan,
            $sum_tnj_bantuan_perumahan,
            $sum_tnj_shift,
            $sum_tnj_transport,
            $bpjs_count->tnj_bpjs_tk_P,
            $bpjs_count->tnj_bpjs_kes_P,
            $tunjangan_lapangan,
            $tunjangan_lain,
            $tunjangan_pajak,
            $lembur,
            $rapel
        ]);

        $absens = $this->absensi->where('date', '>=', now()->format('m Y'));
        $potongan_lainnya = $GajiController->absensi_count($absens, $tnj_makan, $tnj_transport);
        $potongan_lain = $gaji->pot_lain;
        $potongan_pajak = $gaji->pot_pajak;
        // $potongan_pajak = $tunjangan_pajak;

        $total3 = array_sum([
            // $bpjs_count->tnj_bpjs_tk_P,
            // $bpjs_count->tnj_bpjs_kes_P,
            $bpjs_count->pot_bpjs_tk_E,
            $bpjs_count->pot_bpjs_kes_E,
            $potongan_lainnya->pot_sakit,
            $potongan_lainnya->pot_kosong,
            $potongan_lainnya->pot_terlambat,
            $potongan_lainnya->pot_perjalanan,
            $potongan_pajak
        ]);
        $total = 0;
        $total_tanpa_pajak = $total1 + ($total2 - $tunjangan_pajak) - ($total3 - $potongan_pajak);
        if ($total1 != 0) {
            $total = array_sum([$total1, $total2]) - $total3;
            $return = (object)[
                'total' => round($total),
                'total1' => $total1,
                'total2' => $total2,
                'total3' => $total3,
                'total' => round($total),
                'gapok' => $gaji_pokok,
                'tnj_jabatan' => $tunjangan_jabatan,
                'tnj_ahli' => $tunjangan_ahli,
                'tnj_lapangan' => $tunjangan_lapangan,
                'total_tanpa_pajak' => $total_tanpa_pajak,
                'tnj_makan' => $sum_tnj_makan,
                'tnj_bantuan_perumahan' => $sum_tnj_bantuan_perumahan,
                'tnj_transport' => $sum_tnj_transport,
                'tnj_lapangan' => $tunjangan_lapangan,
                'tnj_lain' => $tunjangan_lain,
                'tnj_pajak' => $tunjangan_pajak,
                'pot_pajak' => $potongan_pajak,
                'pot_lain' => $potongan_lain,
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
            'gapok' => 0,
            'tnj_ahli' => 0,
            'tnj_lapangan' => 0,
            'tnj_jabatan' => 0,
            'tnj_makan' => 0,
            'tnj_bantuan_perumahan' => 0,
            'tnj_transport' => 0,
            'tnj_lapangan' => 0,
            'tnj_lain' => 0,
            'tnj_shift' => 0,
            'lembur' => 0,
            'rapel' => 0,
            'bpjs_var' => $bpjs_count,
            'potongan_lainnya' => $potongan_lainnya,
            'total_tanpa_pajak' => 0,
        ];
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
