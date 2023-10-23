<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGajiParamRequest;
use App\Http\Requests\UpdateGajiParamRequest;
use App\Models\Gaji\Gaji;
use App\Models\Gaji\GajiParamTnjng;
use App\Models\Gaji\GajiParamTunJab;
use App\Models\Golongan;
use App\Models\Position;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GajiParamController extends Controller
{
    // TunJab
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Gaji.GajiParam.PageDataGajiParam', [
            'gajiparams' => GajiParamTnjng::all(),
            'gajiparam_tunjab' => GajiParamTunJab::all(),
            'golongans' => Golongan::all(),
            'positions' => Position::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGajiParamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $param = GajiParamTunJab::create([
                'gaji_fungsional' => $request['gajifungsional'],
                'gaji_struktural' => $request['gajistruktural'],
                'golongan_id' => $request['golongan_id'],
                'position_id' => $request['position_id'],
            ]);
            // dd($param);
            if ($param) {
                return redirect()->back()->with('success', '');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Parameter creation failed')->withInput();
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGajiParamRequest  $request
     * @param  \App\Models\GajiParam  $gajiParam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GajiParamTunJab $gajiparam)
    {
        $validationRule = Validator::make($request->all(), [
            'gaji_fungsional' => 'required',
            'gaji_struktural' => 'required',
            'golongan_id' => 'required',
            'position_id' => 'required'
        ]);
        if ($validationRule->fails()) {
            return Redirect::back()->withErrors($validationRule)->withInput();
        }
        try {
            $gajiparam->update([
                'gaji_fungsional' =>
                $request['gaji_fungsional'],
                'gaji_struktural' =>
                $request['gaji_struktural'],
                'golongan_id' => $request['golongan_id'],
                'position_id' => $request['position_id']
            ]);
            return Redirect::back()->with('success', '')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Update Parameter Gaji')->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GajiParam  $gajiParam
     * @return \Illuminate\Http\Response
     */
    public function destroy(GajiParamTunJab $gajiparam)
    {
        try {
            $gajiparam->delete();
            return redirect()->back()->with('succ', 'Success Deleting Parameter')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Deleting Parameter Failed')->withInput();
        }
    }

    // Tunjangan
    public function param_tunjangan_store(Request $request)
    {
        try {
            $param = GajiParamTnjng::create([
                'tnj_transport' => $request['tnj_transport'],
                'tnj_perumahan' => $request['tnj_perumahan'],
                'tnj_makan' => $request['tnj_makan'],
                'tnj_shift' => $request['tnj_shift'],
                'golongan_id' => $request['golongan_id'],
                'position_id' => $request['position_id'],
            ]);
            // dd($param);
            if ($param) {
                return redirect()->back()->with('success', '');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Parameter creation failed')->withInput();
        }
    }
    public function param_tunjangan_update(Request $request, GajiParamTnjng $tunjangan)
    {
        $validationRule = Validator::make($request->all(), [
            'tnj_transport' => 'required',
            'tnj_perumahan' => 'required',
            'tnj_makan' => 'required',
            'tnj_shift' => 'required',
            'golongan_id' => 'required',
            'position_id' => 'required'
        ]);
        if ($validationRule->fails()) {
            return Redirect::back()->withErrors($validationRule)->withInput();
        }
        try {
            $tunjangan->update([
                'tnj_transport' =>
                $request['tnj_transport'],
                'tnj_perumahan' =>
                $request['tnj_perumahan'],
                'tnj_makan' =>
                $request['tnj_makan'],
                'tnj_shift' =>
                $request['tnj_shift'],
                'golongan_id' => $request['golongan_id'],
                'position_id' => $request['position_id']
            ]);
            return Redirect::back()->with('success', '')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Update Parameter Gaji')->withInput();
        }
    }
    public function param_tunjangan_destroy(GajiParamTnjng $tunjangan)
    {
        try {
            $tunjangan->delete();
            return redirect()->back()->with('succ', 'Success Deleting Parameter')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Deleting Parameter Failed')->withInput();
        }
    }
}
