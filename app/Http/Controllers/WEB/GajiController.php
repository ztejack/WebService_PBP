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
        $users = User::all();
        $collectionuser = $users->map(function ($user) {
            return $this->user_resource($user);
        });
        // dd($collectionuser);
        return view(
            'pages.Gaji.PageDataGaji',
            [
                'users' => $collectionuser,
            ]
        );
    }
    function bpjs_cout($gajipokok, $total1, $param_tnj)
    {
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
        $tnj_bpjs_kes_E = ($total2 * $param_BPJS->kes_E) / 100;
        $bpjs_count = (object)[
            'tnj_bpjs_tk_P' => $tnj_bpjs_TK,
            'pot_bpjs_tk_E' => $pot_bpjs_TK,
            'tnj_bpjs_kes_P' => $tnj_bpjs_kes_P,
            'pot_bpjs_kes_E' => $tnj_bpjs_kes_E,
        ];
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
        $pot_sakit = $tnj_makan * $sumSakit;
        $pot_terlambat = $tnj_makan * $sumTerlambat;
        $pot_kosong = $tnj_makan * $sumKosong;
        $pot_perjalanan = ($tnj_makan + $tnj_transport) * $sumPerjalanan;
        // dd($pot_perjalanan);
        $potongan = (object)[
            'pot_sakit' => $pot_sakit,
            'pot_terlambat' => $pot_terlambat,
            'pot_kosong' => $pot_kosong,
            'pot_perjalanan' => $pot_perjalanan,
        ];
        return $potongan;
    }
    // function absensi_grouping($absensis)
    // {
    //     // dd($absensis);
    //     // Buat array untuk mengelompokkan data per bulan
    //     $dataPerBulan = [];

    //     foreach ($absensis as $absensi) {
    //         // Ambil tahun dan bulan dari tanggal
    //         $yearMonth = $absensi->date->format('M Y');

    //         // Buat array untuk setiap tahun-bulan
    //         if (!isset($dataPerBulan[$yearMonth])) {
    //             $dataPerBulan[$yearMonth] = ([
    //                 'sakit' => 0,
    //                 'terlambat' => 0,
    //                 'kosong' => 0,
    //                 'perjalanan' => 0,
    //                 'date' => now()->format('M Y'),
    //             ]);
    //         }

    //         // Tambahkan nilai 'sakit', 'terlambat', dan 'perjalanan' ke tahun-bulan yang sesuai
    //         $dataPerBulan[$yearMonth]['sakit'] += $absensi->sakit;
    //         $dataPerBulan[$yearMonth]['terlambat'] += $absensi->terlambat;
    //         $dataPerBulan[$yearMonth]['kosong'] += $absensi->kosong;
    //         $dataPerBulan[$yearMonth]['perjalanan'] += $absensi->perjalanan;
    //         $dataPerBulan[$yearMonth]['date'] = $absensi->date->format('M Y');
    //     }
    //     // dd((object)$dataPerBulan);
    //     $data_absensi = array_map(function ($item) {
    //         return (object)$item;
    //     }, $dataPerBulan);
    //     // dd($data_absensi);

    //     return (object)$data_absensi;
    // }
    function total_absensi($absensis, $tnj_makan, $tnj_transport)
    {
        foreach ($absensis as $item) {
            $item->total_sum = ($item->sakit * $tnj_makan) + ($item->kosong * $tnj_makan) + ($item->terlambat * $tnj_makan) + ($item->perjalanan * ($tnj_makan + $tnj_transport));
        }
        // dd($absensis);
        return $absensis;
    }
    const nanan = 123;
    public function view_gaji_employe(User $user)
    {
        $gaji = $user->employee->gaji;
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
        $type_tunjangan_jabatan = $gaji->type_tunjab;
        $total1 = array_sum([$gaji_pokok, $tunjangan_ahli, $tunjangan_jabatan]);

        $tnj_makan = $param_tnj == null ? 0 : $param_tnj->tnj_makan;
        $tnj_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
        $tnj_transport = $param_tnj == null ? 0 : $param_tnj->tnj_transport;
        $tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;

        $sum_tnj_makan = $param_tnj == null ? 0 : ($param_tnj->tnj_makan * 24);
        $sum_tnj_perumahan = $param_tnj == null ? 0 : $param_tnj->tnj_perumahan;
        $sum_tnj_transport = $param_tnj == null ? 0 : ($param_tnj->tnj_transport * 24);
        $sum_tnj_shift = $param_tnj == null ? 0 : $param_tnj->tnj_shift;

        $bpjs_count = $this->bpjs_cout($gaji_pokok, $total1, $param_tnj);

        $total2 = array_sum([$sum_tnj_makan, $sum_tnj_perumahan, $sum_tnj_shift, $sum_tnj_transport, $bpjs_count->tnj_bpjs_tk_P, $bpjs_count->tnj_bpjs_kes_P]);

        $absens = $user->absensi->where('date', '>=', now()->format('m Y'));
        $absensis = $user->absensi->sortByDesc('created_at');
        // $absensiscount = $this->absensi_grouping($absensis);
        $absensiscount = $this->total_absensi($user->employee->absensi, $tnj_makan, $tnj_transport);

        $potongan_lainnya = $this->absensi_count($absens, $tnj_makan, $tnj_transport);

        $total_potongan_lainnya = array_sum([
            $potongan_lainnya->pot_sakit,
            $potongan_lainnya->pot_kosong,
            $potongan_lainnya->pot_terlambat,
            $potongan_lainnya->pot_perjalanan
        ]);

        $total3 = array_sum([
            $bpjs_count->pot_bpjs_tk_E,
            $bpjs_count->pot_bpjs_kes_E,
            $potongan_lainnya->pot_sakit,
            $potongan_lainnya->pot_kosong,
            $potongan_lainnya->pot_terlambat,
            $potongan_lainnya->pot_perjalanan
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
            'tunjangan_shift' => $sum_tnj_shift,
            'tunjangan_BPJS_tk' => $bpjs_count->tnj_bpjs_tk_P,
            'tunjangan_BPJS_kes' => $bpjs_count->tnj_bpjs_kes_P,

            'potongan_lainnya' => $potongan_lainnya,
            'total_potongan_lainnya' => $total_potongan_lainnya,
            'data_absensi' => $absensiscount,

            // 'potongan_lainnya'
            'potongan_BPJS_tk' => $bpjs_count->pot_bpjs_tk_E,
            'potongan_BPJS_kes' => $bpjs_count->pot_bpjs_kes_E,

            'total' => $total,

            'total2' => $total2,
            'total3' => $total3
        ]);
    }
    public function update_gaji_employe(Request $request, Gaji $gaji)
    {
        $validationRule = Validator::make($request->all(), [
            'gapok' => 'required',
            'tnj_jabatan' => 'required',
            'tunjab-type' => 'required'
        ]);
        if ($validationRule->fails()) {
            return Redirect::back()->withErrors($validationRule)->withInput();
            // return Redirect::back()->with('succ', 'Failed Update')->withInput();
        }
        try {
            $total = array_sum([$request['gapok'], $request['tnj_ahli'], $request['tnj_jabatan']]);
            $gaji->update(
                [
                    'gapok' => $request['gapok'],
                    'tnj_ahli' => $request['tnj_ahli'],
                    'tnj_jabatan' => $request['tnj_jabatan'],
                    'type_tunjab' => $request['tunjab-type'],
                    'total_gaji' => $total,
                ]
            );
            // dd($request->session());
            return Redirect::back()->with('succ', 'Success Update Gaji')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Update Gaji')->withInput();
        }
    }

    function sum_absensi($absensi)
    {
    }
    public function user_resource($user)
    {
        $absensi = $user->employee->absensiForCurrentMonth();

        $data = [
            'slug' => $user->slug,
            'name' => $user->name,
            'position' => $user->employee->position != null ? $user->employee->position->position : null,
            'golongan' => $user->employee->golongan != null ? $user->employee->golongan->golongan : null,
            'employe_uuid' => $user->employee->uuid,
            'gaji' => $user->employee->gaji->total_gaji,
            'absensi' => $absensi,
        ];
        return (object)$data;
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

    public function detail_slip_gaji()
    {
        return view('pages.Gaji.Slip.PageDetailSlip', []);
    }

    public function print_slip_gaji()
    {
        return view('pages.Gaji.Slip.PagePrintDetailslip', []);
    }
}
