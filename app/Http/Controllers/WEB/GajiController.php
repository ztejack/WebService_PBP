<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Gaji\Gaji;
use App\Http\Requests\StoreGajiRequest;
use App\Http\Requests\UpdateGajiRequest;
use App\Http\Resources\UserResource;
use App\Models\Employe;
use App\Models\Gaji\Absensi;
use App\Models\Gaji\GajiParamTnjng;
use App\Models\Gaji\GajiParamTunJab;
use App\Models\Gaji\GajiSubmit;
use App\Models\Gaji\ParamBPSJ;
use App\Models\GajiSlip;
use App\Models\Golongan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('username', '!=', 'superuser')->get();
        $collectionuser = $users->map(function ($user) {
            return $this->user_resource($user);
        });
        // dd(GajiSubmit::orderBy('created_at', 'desc')->get());
        // dd($collectionuser);
        return view(
            'pages.Gaji.PageDataGaji',
            [
                'payrolls' => GajiSubmit::orderBy('created_at', 'desc')->get(),
                'users' => $collectionuser,
            ]
        );
    }
    function bpjs_cout($gajipokok, $total1, $status)
    {
        if ($gajipokok <= 0 || $status == false) {
            $bpjs_count = (object)[
                'tnj_bpjs_tk_P' => false,
                'pot_bpjs_tk_E' => false,
                'tnj_bpjs_kes_P' => false,
                'pot_bpjs_kes_E' => false,
                'pot_bpjs_tk_R' => false,
                'pot_bpjs_kes_R' => false,
            ];
            return $bpjs_count;
        }
        $param_BPJS = ParamBPSJ::where('status', true)->get()->first();
        $tnj_bpjs_jp_P = ($total1 * $param_BPJS->jp_P) / 100;
        $pot_bpjs_jp_E = ($total1 * $param_BPJS->jp_E) / 100;
        if ($total1 > $param_BPJS->gaji_max_jp) {
            $total = $param_BPJS->gaji_max_jp;
            $tnj_bpjs_jp_P = ($total * $param_BPJS->jp_P) / 100;
            $pot_bpjs_jp_E = ($total * $param_BPJS->jp_E) / 100;
        }
        //TK_P
        $param_bpjs_tk_no_jp = array_sum([
            $param_BPJS->jht_P,
            $param_BPJS->jkk_P,
            $param_BPJS->jkm_P,
        ]);
        $tnj_bpjs_tk_no_jp = ($total1 * $param_bpjs_tk_no_jp) / 100;
        $tnj_bpjs_TK = $tnj_bpjs_jp_P + $tnj_bpjs_tk_no_jp;

        //TK_E
        $pot_bpjs_no_jp = ($total1 * $param_BPJS->jht_E) / 100;
        $pot_bpjs_TK = $pot_bpjs_jp_E + $pot_bpjs_no_jp;

        // Kes_P
        $total2 = $total1;
        if ($total1 > $param_BPJS->kes_max) {
            $total2 = $param_BPJS->kes_max;
        } elseif ($total1 < $param_BPJS->kes_min) {
            $total2 = $param_BPJS->kes_min;
        }
        $tnj_bpjs_kes_P = ($total2 * $param_BPJS->kes_P) / 100;
        $pot_bpjs_kes_E = ($total2 * $param_BPJS->kes_E) / 100;
        $bpjs_count = (object)[
            // 'pot_jp' => ,
            'tnj_bpjs_tk_P' => round($tnj_bpjs_TK),
            'pot_bpjs_tk_E' => round($pot_bpjs_TK + $tnj_bpjs_TK),
            'tnj_bpjs_kes_P' => round($tnj_bpjs_kes_P),
            'pot_bpjs_kes_E' => round($pot_bpjs_kes_E + $tnj_bpjs_kes_P),

            'pot_bpjs_tk_R' => round($pot_bpjs_TK),
            'pot_bpjs_kes_R' => round($pot_bpjs_kes_E),

        ];
        // dd($bpjs_count);
        return $bpjs_count;
        // $tnj_bpjs_jp =
    }
    function absensi_count($absensis, $tnj_makan, $tnj_transport)
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $sumSakit = $absensis->whereBetween('date', [$currentMonth, $endOfMonth])
            ->sum('sakit');
        $sumTerlambat = $absensis->whereBetween('date', [$currentMonth, $endOfMonth])
            ->sum('terlambat');
        $sumKosong = $absensis->whereBetween('date', [$currentMonth, $endOfMonth])
            ->sum('kosong');
        $sumPerjalanan = $absensis->whereBetween('date', [$currentMonth, $endOfMonth])
            ->sum('perjalanan');
        // $sum_tnj_for_tnj_makan = array_sum([$sumSakit, $sumKosong, $sumTerlambat]);

        // $pot_sakit = ($tnj_makan + $tnj_transport) * $sumSakit;
        // $pot_terlambat = $tnj_makan * $sumTerlambat;
        // $pot_kosong = ($tnj_makan + $tnj_transport) * $sumKosong;
        // $pot_perjalanan = ($tnj_makan + $tnj_transport) * $sumPerjalanan;

        // dd($pot_perjalanan);
        // $potongan = (object)[
        //     'pot_sakit' => $pot_sakit,
        //     'pot_terlambat' => $pot_terlambat,
        //     'pot_kosong' => $pot_kosong,
        //     'pot_perjalanan' => $pot_perjalanan,
        // ];
        $pot_sakit = $tnj_makan * $sumSakit;
        $pot_terlambat = $tnj_makan * $sumTerlambat;
        $pot_kosong = $tnj_makan * $sumKosong;
        $pot_perjalanan = $tnj_makan * $sumPerjalanan;
        $pot_makan = $pot_sakit + $pot_terlambat + $pot_kosong + $pot_perjalanan;

        $pot_sakit = $tnj_transport * $sumSakit;
        $pot_kosong = $tnj_transport * $sumKosong;
        $pot_perjalanan = $tnj_transport * $sumPerjalanan;
        $pot_transport = $pot_sakit + $pot_kosong + $pot_perjalanan;

        // dd(['makan' => $pot_makan, 'transport' => $pot_transport]);
        $potongan = (object)[
            'pot_tnj_makan' => $pot_makan,
            'pot_tnj_transport' => $pot_transport,
            // 'pot_tnj_makan' => 0,
            // 'pot_tnj_transport' => 0,
        ];
        return $potongan;
    }
    function total_absensi($absensis, $tnj_makan, $tnj_transport)
    {
        // dd($absensis);
        foreach ($absensis as $item) {
            // dd($item->sakit);
            // dd($absensis->kosong);
            // dd($item->terlambat);
            // dd($item->perjalanan);
            $item->total_sum = ($item->sakit * ($tnj_makan + $tnj_transport)) + ($item->kosong * ($tnj_makan + $tnj_transport)) + ($item->terlambat * $tnj_makan) + ($item->perjalanan * ($tnj_makan + $tnj_transport));
        }
        // dd((object)$absensis);
        return $absensis;
    }
    // const nanan = 123;
    public function view_gaji_employe(User $user)
    {
        $gaji = $user->employee->gaji;
        if ($user->employee->contract->contract == 'DIREKSI') {
            $rapels = $user->employee->getcurrentrapel();
            $rapel = $rapels == null ? 0 : $rapels->jumlah;
            $rapelcount = $user->employee->rapel;

            $gaji_count = $user->employee->gajicount();

            return view('pages.Gaji.PageDetailGaji', [
                'user' => $user,
                'gaji' => $gaji,
                'gapok' => $gaji_count->gapok,
                'tunjab' => $gaji_count->tunjab,
                'tunjangan_perumahan' => $gaji_count->tnj_perumahan,
                'tunjangan_ubp' => $gaji_count->tnj_ubp,
                'tunjangan_dana_pensiun' => $gaji_count->tnj_dana_pensiun,
                'tunjangan_simmode' => $gaji_count->tnj_simmode,
                'tunjangan_bpjs_tk' => $gaji_count->tnj_bpjs_tk,
                'tunjangan_bpjs_jkm' => $gaji_count->tnj_bpjs_jkm,
                'tunjangan_bpjs_jht' => $gaji_count->tnj_bpjs_jht,
                'tunjangan_bpjs_jp' => $gaji_count->tnj_bpjs_jp,
                'tunjangan_bpjs_kes' => $gaji_count->tnj_bpjs_kes,
                'tunjangan_pajak' => $gaji_count->tnj_pajak,
                'tunjangan_lain' => $gaji_count->tnj_lain,

                'pot_spba' => $gaji_count->pot_spba,
                'pot_lazis' => $gaji_count->pot_lazis,
                'pot_i_dana_pensiun' => $gaji_count->pot_dana_pensiun,
                'pot_simmode' => $gaji_count->pot_simmode,
                'pot_koperasi' => $gaji_count->pot_koperasi,
                'pot_bpjs_tk' => $gaji_count->pot_bpjs_tk,
                'pot_bpjs_jkm' => $gaji_count->pot_bpjs_jkm,
                'pot_bpjs_jht' => $gaji_count->pot_bpjs_jht,
                'pot_bpjs_jp' => $gaji_count->pot_bpjs_jp,
                'pot_bpjs_kes' => $gaji_count->pot_bpjs_kes,
                'pot_pajak' => $gaji_count->pot_pajak,
                'pot_lain' => $gaji_count->pot_lain,
                'data_rapel' => $rapelcount,
                'slips' => $user->employee->slip()->orderBy('created_at', 'desc')->get(),

                //recap
                'rapel' => $rapel,
                'total' => $gaji->total_gaji,
                'penghasilan' => $gaji_count->penghasilan,
                'potongan' => $gaji_count->potongan
            ]);
        } elseif ($user->employee->contract->contract == 'KOMISARIS') {
            $rapels = $user->employee->getcurrentrapel();
            $rapel = $rapels == null ? 0 : $rapels->jumlah;
            $rapelcount = $user->employee->rapel;

            $gaji_count = $user->employee->gajicount();
            // dd($gaji_count);
            $total1 = array_sum([$gaji_count->tunjab, $gaji_count->gapok]);
            $total2 = array_sum([
                $gaji_count->tnj_makan,
                $gaji_count->tnj_bantuan_perumahan,
                $gaji_count->tnj_transport,
                $gaji_count->tnj_shift,
                $gaji_count->tnj_lain,
                $gaji_count->tnj_pajak,
            ]);
            $total3 = array_sum([
                $gaji_count->pot_lain,
                $gaji_count->pot_pajak,
            ]);
            $total = round(array_sum([
                $total1, $total2
            ]) - $total3);
            return view('pages.Gaji.PageDetailGaji', [
                'user' => $user,
                'gaji' => $gaji,
                'gapok' => $gaji_count->gapok,
                'tnj_jabatan' => $gaji_count->tunjab,
                'total1' => round($total1),

                'tunjangan_makan' => $gaji_count->tnj_makan,
                'tunjangan_bantuan_perumahan' => $gaji_count->tnj_bantuan_perumahan,
                'tunjangan_transport' => $gaji_count->tnj_transport,
                'tunjangan_shift' => $gaji_count->tnj_shift,
                'tunjangan_lain' => $gaji_count->tnj_lain,
                'tunjangan_pajak' => $gaji_count->tnj_pajak,

                'rapel' => $rapel,

                'potongan_lain' => $gaji_count->pot_lain,
                'potongan_pajak' => $gaji_count->pot_pajak,

                'total2' => round($total2),
                'total3' => round($total3),

                'total' => round($total),

                'data_rapel' => $rapelcount,
                'slips' => $user->employee->slip()->orderBy('created_at', 'desc')->get(),
            ]);
        }

        if ($user->golongan == null || $user->position == null) {
            return view('pages.Gaji.PageDetailGaji', [
                'user' => $user,
                'param_tnj_jabatan' => null,
                'param_tnj' => null,
                'gaji_struktural' => null,
                'gaji_fungsional' => null
            ]);
        }

        $param_tnj = GajiParamTnjng::where('position_id', $user->position->id)->where('golongan_id', $user->golongan->id)->first();
        $param_tnj_jabatan = GajiParamTunJab::where('position_id', $user->position->id)->where('golongan_id', $user->golongan->id)->first();

        $gaji_struktural = $param_tnj_jabatan == null ? 0 : $param_tnj_jabatan->gaji_struktural;
        $gaji_fungsiional =  $param_tnj_jabatan == null ? 0 : $param_tnj_jabatan->gaji_fungsional;
        $gaji_pokok = $gaji->gapok;
        $tunjangan_ahli = $gaji->tnj_ahli;
        $tunjangan_jabatan = $gaji->tnj_jabatan;
        $tunjangan_lapangan = $gaji->tnj_lapangan;
        $tunjangan_lain = $gaji->tnj_lain;
        $tunjangan_pajak = $gaji->tnj_pajak;
        $type_tunjangan_jabatan = $gaji->type_tunjab;
        $bpjs_status = $gaji->bpjs_status;
        $total1 = array_sum([$gaji_pokok, $tunjangan_ahli, $tunjangan_jabatan]);

        $tnj_makan = $param_tnj == null ? 0 : $param_tnj->tnj_makan;
        $tnj_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
        $tnj_transport = $param_tnj == null ? 0 : $param_tnj->tnj_transport;
        $tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;

        $sum_tnj_makan = $param_tnj == null ? 0 : ($param_tnj->tnj_makan * 24);
        $sum_tnj_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
        //
        //
        $sum_tnj_transport = $param_tnj == null ? 0 : ($param_tnj->tnj_transport * 24);
        $sum_tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;

        $bpjs_count = $this->bpjs_cout($gaji_pokok, $total1, $bpjs_status);

        $lemburs = $user->employee->getcurrentlembur();
        // dd($user->employee->lembur);
        $lembur = $lemburs == null ? 0 : $lemburs->jumlah;

        $rapels = $user->employee->getcurrentrapel();
        // dd($user->employee->rapel);
        $rapel = $rapels == null ? 0 : $rapels->jumlah;

        // $lemburcount = $user->employee->lembur()->sortByDesc('created_at');
        $lemburcount = $user->employee->lembur;
        // dd($lemburcount);
        $rapelcount = $user->employee->rapel;
        $absens = $user->absensi->where('date', '>=', now()->format('m Y'));
        $absensis = $user->absensi->sortByDesc('created_at');

        $absensiscount = $this->total_absensi($user->employee->absensi()->orderBy('created_at', 'desc')->get(), $tnj_makan, $tnj_transport);
        $potongan_lainnya = $this->absensi_count($user->employee->absensi()->orderBy('created_at', 'desc')->get(), $tnj_makan, $tnj_transport);
        // dd($potongan_lainnya);
        $sum_tnj_makan =  $sum_tnj_makan - $potongan_lainnya->pot_tnj_makan;
        $sum_tnj_transport = $sum_tnj_transport - $potongan_lainnya->pot_tnj_transport;

        $total2 = array_sum([
            $sum_tnj_makan,
            $sum_tnj_perumahan,
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
        // Potongan
        $potongan_pajak = $gaji->pot_pajak;
        $potongan_lain = $gaji->pot_lain;

        // $total_potongan_lainnya = array_sum([
        //     $potongan_lainnya->pot_sakit,
        //     $potongan_lainnya->pot_kosong,
        //     $potongan_lainnya->pot_terlambat,
        //     $potongan_lainnya->pot_perjalanan
        // ]);

        $total3 = array_sum([
            $potongan_lain,
            $potongan_pajak,
            $bpjs_count->pot_bpjs_tk_E,
            $bpjs_count->pot_bpjs_kes_E,
            // $potongan_lainnya->pot_sakit,
            // $potongan_lainnya->pot_kosong,
            // $potongan_lainnya->pot_terlambat,
            // $potongan_lainnya->pot_perjalanan
        ]);

        $total = $total1 + $total2 - $total3;

        return view('pages.Gaji.PageDetailGaji', [
            'user' => $user,
            'gaji' => $gaji,
            'gapok' => $gaji_pokok,
            'tnj_ahli' => $tunjangan_ahli,
            'type_tunjab' => $type_tunjangan_jabatan,
            'tnj_jabatan' => $tunjangan_jabatan,

            'tnj_makan' => $tnj_makan,
            'tnj_transport' => $tnj_transport,

            'param_tnj' => $param_tnj = null ? 0 : $param_tnj,
            'gaji_struktural' => $gaji_struktural,
            'gaji_fungsional' => $gaji_fungsiional,
            'total1' => $total1,

            'tunjangan_makan' => $sum_tnj_makan,
            'tunjangan_perumahan' => $sum_tnj_perumahan,
            'tunjangan_transport' => $sum_tnj_transport,
            'tunjangan_lapangan' => $tunjangan_lapangan,
            'tunjangan_lain' => $tunjangan_lain,
            'tunjangan_pajak' => $tunjangan_pajak,

            'lembur' => $lembur,
            'rapel' => $rapel,
            'tunjangan_shift' => $sum_tnj_shift,

            'bpjs_status' => $bpjs_status,
            'tunjangan_BPJS_tk' => round($bpjs_count->tnj_bpjs_tk_P),
            'tunjangan_BPJS_kes' => round($bpjs_count->tnj_bpjs_kes_P),

            'potongan_lainnya' => $potongan_lainnya,
            // 'total_potongan_lainnya' => $total_potongan_lainnya,
            // 'potongan_lainnya'
            'potongan_pajak' => $potongan_pajak,
            'potongan_lain' => $potongan_lain,
            'potongan_BPJS_tk' => round($bpjs_count->pot_bpjs_tk_E),
            'potongan_BPJS_kes' => round($bpjs_count->pot_bpjs_kes_E),

            'total' => round($total),

            'total2' => round($total2),
            'total3' => round($total3),

            'data_absensi' => $absensiscount,
            'data_lembur' => $lemburcount,
            'data_rapel' => $rapelcount,
            'slips' => $user->employee->slip()->orderBy('created_at', 'desc')->get(),
        ]);
    }
    public function update_gaji_employe(Request $request, Gaji $gaji)
    {
        // dd($request);
        $validationRule = Validator::make($request->all(), [
            'gapok' => 'required',
            'tnj_jabatan' => '',
            'tunjab-type' => ''
        ]);
        if ($validationRule->fails()) {
            return Redirect::back()->withErrors($validationRule)->withInput();
            // return Redirect::back()->with('succ', 'Failed Update')->withInput();
        }
        try {
            if ($gaji->employee->contract->contract == "DIREKSI") {
                $penghasilan =
                    array_sum([
                        $request['gapok'],
                        $request['tunjab'],
                        $request['tnj_perumahan'],
                        $request['tnj_ubp'],
                        $request['tnj_dana_pensiun'],
                        $request['tnj_simmode'],
                        $request['tnj_bpjs_tk'],
                        $request['tnj_bpjs_jkm'],
                        $request['tnj_bpjs_jht'],
                        $request['tnj_bpjs_jp'],
                        $request['tnj_bpjs_kes'],
                        $request['tnj_pajak'],
                        $request['tnj_lain'],
                    ]);
                $potongan = array_sum([
                    $request['pot_spba'],
                    $request['pot_lazis'],
                    $request['pot_i_dana_pensiun'],
                    $request['pot_simmode'],
                    $request['pot_koperasi'],
                    $request['pot_bpjs_tk'],
                    $request['pot_bpjs_jkm'],
                    $request['pot_bpjs_jht'],
                    $request['pot_bpjs_jp'],
                    $request['pot_bpjs_kes'],
                    $request['pot_pajak'],
                    $request['pot_lain'],
                ]);
                $total = $penghasilan - $potongan;
                $gaji->update(
                    [
                        'gapok' => $request['gapok'],
                        'tnj_jabatan' => $request['tunjab'],
                        'tnj_perumahan' => $request['tnj_perumahan'],
                        'tnj_bantuan_perumahan' => $request['tnj_ubp'],
                        'tnj_dana_pensiun' => $request['tnj_dana_pensiun'],
                        'tnj_simmode' => $request['tnj_simmode'],
                        'tnj_bpjs_tk' => $request['tnj_bpjs_tk'],
                        'tnj_bpjs_jkm' => $request['tnj_bpjs_jkm'],
                        'tnj_bpjs_jht' => $request['tnj_bpjs_jht'],
                        'tnj_bpjs_jp' => $request['tnj_bpjs_jp'],
                        'tnj_bpjs_kes' => $request['tnj_bpjs_kes'],
                        'tnj_pajak' => $request['tnj_pajak'],
                        'tnj_lain' => $request['tnj_lain'],

                        'pot_serikat_pegawai_ba' => $request['pot_spba'],
                        'pot_koperasi' => $request['pot_koperasi'],
                        'pot_lazis' => $request['pot_lazis'],
                        'pot_dana_pensiun' => $request['pot_i_dana_pensiun'],
                        'pot_simmode' => $request['pot_simmode'],
                        'pot_bpjs_tk' => $request['pot_bpjs_tk'],
                        'pot_bpjs_jkm' => $request['pot_bpjs_jkm'],
                        'pot_bpjs_jht' => $request['pot_bpjs_jht'],
                        'pot_bpjs_jp' => $request['pot_bpjs_jp'],
                        'pot_bpjs_kes' => $request['pot_bpjs_kes'],
                        'pot_pajak' => $request['pot_pajak'],
                        'pot_lain' => $request['pot_lain'],
                        'total_gaji' => $total,
                    ]
                );

                return Redirect::back()->with('succ', 'Success Update Gaji')->withInput();
            } elseif ($gaji->employee->contract->contract == "KOMISARIS") {
                $penghasilan =
                    array_sum([
                        $request['gapok'],
                        $request['tnj_jabatan'],
                        $request['tnj_makan'],
                        $request['tnj_bantuan_perumahan'],
                        $request['tnj_transport'],
                        $request['tnj_shift'],
                        $request['tnj_pajak'],
                        $request['tnj_lain']
                    ]);
                $potongan = array_sum([
                    $request['tnj_pajak'],
                    $request['pot_lain'],
                ]);
                $total = $penghasilan - $potongan;
                $gaji->update(
                    [
                        'gapok' => $request['gapok'],
                        'tnj_jabatan' => $request['tnj_jabatan'],
                        'tnj_makan' => $request['tnj_makan'],
                        'tnj_bantuan_perumahan' => $request['tnj_bantuan_perumahan'],
                        'tnj_transport' => $request['tnj_transport'],
                        'tnj_shift' => $request['tnj_shift'],
                        'tnj_pajak' => $request['tnj_pajak'],
                        'tnj_lain' => $request['tnj_lain'],

                        'pot_pajak' => $request['tnj_pajak'],
                        'pot_lain' => $request['pot_lain'],
                        'total_gaji' => $total,
                    ]
                );
                return Redirect::back()->with('succ', 'Success Update Gaji')->withInput();
            } elseif ($gaji->employee->contract->contract != "DIREKSI" || $gaji->employee->contract->contract != "KOMISARIS") {
                $total = array_sum([$request['gapok'], $request['tnj_ahli'], $request['tnj_jabatan']]);
                // dd($request);
                $bpjscount = $this->bpjs_cout(
                    $request['gapok'],
                    array_sum([$request['gapok'], $request['tnj_jabatan'], $request['tnj_ahli']]),
                    $request['bpjs_status']
                );
                $gaji->update(
                    [
                        'gapok' => $request['gapok'],
                        'tnj_ahli' => $request['tnj_ahli'],
                        'tnj_jabatan' => $request['tnj_jabatan'],
                        'tnj_lapangan' => $request['tnj_lapangan'],
                        'tnj_lain' => $request['tnj_lain'],
                        'type_tunjab' => $request['tunjab-type'] != null ? $request['tunjab-type'] : '',
                        'bpjs_status' => $request['bpjs_status'],
                        'pot_lain' => $request['pot_lain'],
                        'tnj_bpjs_tk' => $bpjscount->tnj_bpjs_tk_P,
                        'tnj_bpjs_kes' => $bpjscount->tnj_bpjs_kes_P,
                        'pot_bpjs_tk' => $bpjscount->pot_bpjs_tk_E,
                        'pot_bpjs_kes' => $bpjscount->pot_bpjs_kes_E,
                        'pot_bpjs_kes_R' => $bpjscount->pot_bpjs_kes_R,
                        'pot_bpjs_tk_R' => $bpjscount->pot_bpjs_tk_R
                    ]
                );
                $gajicount = $gaji->employee->gajicount();
                $gaji->update(
                    [
                        'total_gaji' => $gajicount->total,
                    ]
                );
                $pajak =  $gaji->employee->pph21count();
                $gaji->update([
                    'tnj_pajak' => $pajak,
                    'pot_pajak' => $pajak,
                ]);
                return Redirect::back()->with('succ', 'Success Update Gaji')->withInput();
            }
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Update Gaji')->withInput();
        }
    }
    public function user_resource($user)
    {
        $absensi = $user->employee->absensiForCurrentMonth();
        $data = [
            'slug' => $user->slug,
            'employe' => $user->employee,
            'name' => $user->name,
            'position' => $user->employee->position != null ? $user->employee->position->position : null,
            'golongan' => $user->employee->golongan != null ? $user->employee->golongan->golongan : null,
            'employe_uuid' => $user->employee->uuid,
            'gaji' => $user->employee->gajicount()->total,
            'absensi' => $absensi,
        ];
        return (object)$data;
    }
    public function salary(Employe $employe)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGajiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGajiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGajiRequest  $request
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGajiRequest $request, Gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji $gaji)
    {
        //
    }
}
