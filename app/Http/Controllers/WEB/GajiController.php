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
use App\Models\GajiSlip;
use App\Models\Golongan;
use App\Models\User;
use Illuminate\Http\Request;

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
        // dd($user->position);

        $param_tnj = GajiParamTnjng::where('position_id', $user->position->id)->where('golongan_id', $user->golongan->id)->first();
        $param_tnj_jabatan = GajiParamTunJab::where('position_id', $user->position->id)->where('golongan_id', $user->golongan->id)->first();
        // if (is_null($param_tnj_jabatan)) {
        //     dd($param_tnj);
        // } else {
        //     dd($param_tnj);
        // }
        // dd($param_tnj_jabatan);
        $gaji_struktural = $param_tnj_jabatan == null ? null : $param_tnj_jabatan->gaji_struktural;
        $gaji_fungsiional =  $param_tnj_jabatan == null ? null : $param_tnj_jabatan->gaji_fungsional;
        $total1 = array_sum([$gaji_fungsiional, $gaji_struktural]);

        $tnj_makan = $param_tnj == null ? null : $param_tnj->tnj_makan;
        $tnj_perumahan = $param_tnj == null ? null : $param_tnj->tnj_perumahan;
        $tnj_transport = $param_tnj == null ? null : $param_tnj->tnj_transport;
        $tnj_shift = $param_tnj == null ? null : $param_tnj->tnj_shift;
        $total2 = array_sum([$tnj_makan, $tnj_perumahan, $tnj_shift, $tnj_transport]);
        $total = $total1 + $total2;

        return view('pages.Gaji.PageDetailGaji', [
            'user' => $user,
            'gaji' => $gaji,
            // 'param_tnj_jabatan' => $param_tnj_jabatan == null ? null : $param_tnj_jabatan,
            'param_tnj' => $param_tnj = null ? null : $param_tnj,
            'gaji_struktural' => $gaji_struktural,
            'gaji_fungsional' => $gaji_fungsiional,
            'tunjangan_makan' => $param_tnj == null ? null : $param_tnj->tnj_makan,
            'tunjangan_perumahan' => $param_tnj == null ? null : $param_tnj->tnj_perumahan,
            'tunjangan_transport' => $param_tnj == null ? null : $param_tnj->tnj_transport,
            'tunjangan_shift' => $param_tnj == null ? null : $param_tnj->tnj_shift,
            'total' => $total,
            'total1' => $total1,
            'total2' => $total2
        ]);
    }
    public function store_param_gaji_employe(Request $request)
    {
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
