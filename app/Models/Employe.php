<?php

namespace App\Models;

use App\Http\Controllers\WEB\GajiController;
use App\Models\Gaji\Absensi;
use App\Models\Gaji\Gaji;
use App\Models\Gaji\GajiParamTnjng;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

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
        // 'golongan',
        'status',
        'date_start',
        'tenure',
        'user_id',
        'contract_id',
        'satker_id',
        'position_id',
        'golongan_id'
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     // 'user_id'
    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function subsatker()
    {
        return $this->belongsTo(Subsatker::class);
    }
    public function satker()
    {
        return $this->belongsTo(Satker::class);
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
    public function gaji()
    {
        return $this->hasOne(Gaji::class, 'employe_id');
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
    public function slip()
    {
        return $this->hasMany(GajiSlip::class);
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
        $gaji_pokok = $gaji->gapok;
        $tunjangan_ahli = $gaji->tnj_ahli;
        $tunjangan_jabatan = $gaji->tnj_jabatan;
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

        $total2 = array_sum([$sum_tnj_makan, $sum_tnj_perumahan, $sum_tnj_shift, $sum_tnj_transport, $bpjs_count->tnj_bpjs_tk_P, $bpjs_count->tnj_bpjs_kes_P]);

        $absens = $this->absensi->where('date', '>=', now()->format('m Y'));
        $potongan_lainnya = $GajiController->absensi_count($absens, $tnj_makan, $tnj_transport);

        $total3 = array_sum([
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
                'total' => $total,
                'tnj_makan' => $sum_tnj_makan,
                'tnj_perumahan' => $sum_tnj_perumahan,
                'tnj_transport' => $sum_tnj_transport,
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
            'tnj_shift' => 0,
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
