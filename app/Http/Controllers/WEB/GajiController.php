<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Gaji\Gaji;
use App\Http\Requests\StoreGajiRequest;
use App\Http\Requests\UpdateGajiRequest;
use App\Http\Resources\UserResource;
use App\Models\Employe;
use App\Models\Gaji\GajiParamTnjng;
use App\Models\Gaji\GajiParamTunJab;
use App\Models\Gaji\ParamBPSJ;
use App\Models\GajiSlip;
use App\Models\Golongan;
use App\Models\User;
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
        if ($gajipokok > $param_BPJS->gaji_max_jp) {
            $total = ($total1 - $gajipokok) + $param_BPJS->gaji_max_jp;
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
        $total_tnj =  ($param_tnj->tnj_makan * 24) + ($param_tnj->tnj_transport * 24) + ($param_tnj->tnj_perumahan * 24);
        $total2 = $total_tnj + $gajipokok;
        if ($gajipokok > $param_BPJS->kes_max) {
            $total2 = $total2 - $gajipokok + $param_BPJS->kes_max;
        } elseif ($gajipokok < $param_BPJS->kes_min) {
            $total2 = $total2 - $gajipokok + $param_BPJS->kes_min;
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

        $bpjs_count = $this->bpjs_cout($gaji_pokok, $total1, $param_tnj);
        // $percent_bpjs_tk = array_sum([
        //     $param_BPJS->jp_P,
        //     $param_BPJS->jkm_P,
        //     $param_BPJS->jkk_P,
        //     $param_BPJS->jht_P,
        // ]);
        // $tnj_bpjs_tk = ($total1 * $param_BPJS->tk_P) / 100;
        // dd([$total1, $percent_bpjs_tk, $param_BPJS->tk_P,$tnj_bpjs_tk]);
        $total2 = array_sum([$tnj_makan, $tnj_perumahan, $tnj_shift, $tnj_transport, $bpjs_count->tnj_bpjs_tk_P, $bpjs_count->tnj_bpjs_kes_P]);

        $total = $total1 + $total2;

        return view('pages.Gaji.PageDetailGaji', [
            'user' => $user,
            'gaji' => $gaji,
            'gapok' => $gaji_pokok,
            'tnj_ahli' => $tunjangan_ahli,
            'type_tunjab' => $type_tunjangan_jabatan,
            'tnj_jabatan' => $tunjangan_jabatan,

            // 'param_tnj_jabatan' => $param_tnj_jabatan == null ? null : $param_tnj_jabatan,
            'param_tnj' => $param_tnj = null ? 0 : $param_tnj,
            'gaji_struktural' => $gaji_struktural,
            'gaji_fungsional' => $gaji_fungsiional,
            'tunjangan_makan' => $param_tnj == null ? 0 : $param_tnj->tnj_makan,
            'tunjangan_perumahan' => $param_tnj == null ? 0 : $param_tnj->tnj_perumahan,
            'tunjangan_transport' => $param_tnj == null ? 0 : $param_tnj->tnj_transport,
            'tunjangan_shift' => $param_tnj == null ? 0 : $param_tnj->tnj_shift,
            'tunjangan_BPJS_tk' => $bpjs_count->tnj_bpjs_tk_P,
            'tunjangan_BPJS_kes' => $bpjs_count->tnj_bpjs_kes_P,
            'potongan_BPJS_tk' => $bpjs_count->pot_bpjs_tk_E,
            'potongan_BPJS_kes' => $bpjs_count->pot_bpjs_kes_E,
            'total' => $total,
            'total1' => $total1,
            'total2' => $total2
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


    public function user_resource($user)
    {
        $data = [
            'slug' => $user->slug,
            'name' => $user->name,
            'position' => $user->employee->position != null ? $user->employee->position->position : null,
            'golongan' => $user->employee->golongan != null ? $user->employee->golongan->golongan : null,
            'employe_uuid' => $user->employee->uuid,
            'gaji' => $user->employee->gaji->total_gaji,
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
