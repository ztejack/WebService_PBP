<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGajiParamRequest;
use App\Http\Requests\UpdateGajiParamRequest;
use App\Models\FamilyStatus;
use App\Models\Gaji\Gaji;
use App\Models\Gaji\GajiParamFamily;
use App\Models\Gaji\GajiParamTnjng;
use App\Models\Gaji\GajiParamTunJab;
use App\Models\Gaji\ParamBPSJ;
use App\Models\Gaji\Tunjangan_lain;
use App\Models\Golongan;
use App\Models\ParamPPH;
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
            'gajiparams' => GajiParamTnjng::orderBy('created_at', 'desc')->get(),
            'gajiparam_tunjab' => GajiParamTunJab::orderBy('created_at', 'desc')->get(),
            'golongans' => Golongan::all(),
            'positions' => Position::all(),
            'gajiparam_bpjs' => ParamBPSJ::orderBy('created_at', 'desc')->get(),
            'tunjangan_lain' => Tunjangan_lain::orderBy('created_at', 'desc')->get(),
            'gajiparam_family' => GajiParamFamily::orderBy('created_at', 'desc')->get(),
            'family_status' => FamilyStatus::all(),
            'parampph' => ParamPPH::get()->first(),
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
    public function param_bpjs_store(Request $request)
    {
        try {
            $tk_e = array_sum([$request['jaminan-pensiun_karyawan'], $request['jaminan-hari-tua_karyawan']]);
            $tk_p = array_sum([
                $request['jaminan-pensiun_perusahaan'],
                $request['jaminan-hari-tua_perusahaan'],
                $request['jaminan-kecelakaan-kerja_perusahaan'],
                $request['jaminan-kematian_perusahaan']
            ]);
            $bpjs = ParamBPSJ::create([
                'jp_E' => $request['jaminan-pensiun_karyawan'],
                'jp_P' => $request['jaminan-pensiun_perusahaan'],
                'gaji_max_jp' => $request['gaji-max_jp'],

                'jht_E' => $request['jaminan-hari-tua_karyawan'],
                'jht_P' => $request['jaminan-hari-tua_perusahaan'],
                'jkk_P' => $request['jaminan-kecelakaan-kerja_perusahaan'],
                'jkm_P' => $request['jaminan-kematian_perusahaan'],

                'tk_E' => $tk_e,
                'tk_P' => $tk_p,

                'kes_E' => $request['jaminan-kesehatan_karyawan'],
                'kes_P' => $request['jaminan-kesehatan_perusahaan'],
                'kes_max' => $request['gaji-max_kesehatan'],
                'kes_min' => $request['gaji-min_kesehatan'],

                'status' => true,

            ]);
            ParamBPSJ::where('id', '!=', $bpjs->id)->update(['status' => false]);
            return redirect()->back()->with('succ', 'Success creation Parameter')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Parameter creation failed')->withInput();
        }
    }
    public function param_bpjs_update(Request $request, ParamBPSJ $bpjs)
    {
        try {
            $tk_e = array_sum([$request['jaminan-pensiun_karyawan'], $request['jaminan-hari-tua_karyawan']]);
            $tk_p = array_sum([
                $request['jaminan-pensiun_perusahaan'],
                $request['jaminan-hari-tua_perusahaan'],
                $request['jaminan-kecelakaan-kerja_perusahaan'],
                $request['jaminan-kematian_perusahaan']
            ]);
            $bpjs->update([
                'jp_E' => $request['jaminan-pensiun_karyawan'],
                'jp_P' => $request['jaminan-pensiun_perusahaan'],
                'gaji_max_jp' => $request['gaji-max_jp'],

                'jht_E' => $request['jaminan-hari-tua_karyawan'],
                'jht_P' => $request['jaminan-hari-tua_perusahaan'],
                'jkk_P' => $request['jaminan-kecelakaan-kerja_perusahaan'],
                'jkm_P' => $request['jaminan-kematian_perusahaan'],

                'tk_E' => $tk_e,
                'tk_P' => $tk_p,

                'kes_E' => $request['jaminan-kesehatan_karyawan'],
                'kes_P' => $request['jaminan-kesehatan_perusahaan'],
                'kes_max' => $request['gaji-max_kesehatan'],
                'kes_min' => $request['gaji-min_kesehatan'],

                'status' => true,

            ]);
            // ParamBPSJ::where('id', '!=', $bpjs->id)->update(['status' => false]);
            return redirect()->back()->with('succ', 'Success update Parameter')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Parameter update failed')->withInput();
        }
    }
    public function param_bpjs_update_status(ParamBPSJ $bpjs)
    {
        try {
            if ($bpjs->status == true) {
                // $bpjs->update(['status' => 0]);
                $hasTrueStatus = ParamBPSJ::where('status', true)->count() > 0;
                // dd($hasTrueStatus);
                if ($hasTrueStatus) {
                    return redirect()->back()->with('err', 'Parameter update status failed, Nothing any Parameter status Active')->withInput();
                }
            } elseif ($bpjs->status == false) {
                $bpjs->update(['status' => 1]);
                ParamBPSJ::where('id', '!=', $bpjs->id)->update(['status' => false]);
            }
            return redirect()->back()->with('succ', 'Success update status Parameter')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Parameter update status failed')->withInput();
        }
    }
    public function param_ptkp_store(Request $request)
    {
        try {
            $paramrecord = GajiParamFamily::where('familystatus_id', $request['familystatus_id'])->first();
            if ($paramrecord) {
                return redirect()->back()->with('err', 'Parameter creation failed, Parameter PTKP ' . $paramrecord->familystatus->familystatus . ' sudah ada')->withInput();
            } else {
                $Paramptkp = GajiParamFamily::create([
                    'tnj_familystatus' => $request['tnj_ptkp'],
                    'familystatus_id' => $request['familystatus_id']
                ]); // dd($Paramptkp);
                return Redirect::back()->with('success', '')->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Parameter creation failed')->withInput();
        }
    }
    public function param_ptkp_update(Request $request, GajiParamFamily $ptkp)
    {
        try {

            $ptkp->update([
                'tnj_familystatus' => $request['tnj_ptkp'],
                'familystatus_id' => $request['familystatus_id']
            ]); // dd($Paramptkp);
            return Redirect::back()->with('succ', 'Success update Parameter')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Parameter Update failed')->withInput();
        }
    }
    public function param_ptkp_destroy(Request $request, GajiParamFamily $ptkp)
    {
        try {
            $ptkp->delete();
            return redirect()->back()->with('succ', 'Success Deleting Parameter')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Deleting Parameter Failed')->withInput();
        }
    }
    public function param_pph_update(Request $request, ParamPPH $pph)
    {
        try {
            // $pph = ParamPPH::get()->first();
            // dd($pph);
            $pph->update([
                'biaya_jabatan' => $request['biaya_jabatan'],

                'jumlah_kategori_pertama' => $request['jumlah_kategori_pertama'],
                'persentase_kategori_pertama' => $request['persentase_kategori_pertama'],
                'pengurang_kategori_pertama' => $request['pengurang_kategori_pertama'],

                'jumlah_kategori_kedua' => $request['jumlah_kategori_kedua'],
                'persentase_kategori_kedua' => $request['persentase_kategori_kedua'],
                'pengurang_kategori_kedua' => $request['pengurang_kategori_kedua'],

                'jumlah_kategori_ketiga' => $request['jumlah_kategori_ketiga'],
                'persentase_kategori_ketiga' => $request['persentase_kategori_ketiga'],
                'pengurang_kategori_ketiga' => $request['pengurang_kategori_ketiga'],

                'jumlah_kategori_keempat' => $request['jumlah_kategori_keempat'],
                'persentase_kategori_keempat' => $request['persentase_kategori_keempat'],
                'pengurang_kategori_keempat' => $request['pengurang_kategori_keempat'],

                'jumlah_kategori_kelima' => $request['jumlah_kategori_kelima'],
                'persentase_kategori_kelima' => $request['persentase_kategori_kelima'],
                'pengurang_kategori_kelima' => $request['pengurang_kategori_kelima'],

            ]);
            return Redirect::back()->with('succ', 'Success update Parameter')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Parameter Update failed')->withInput();
        }
    }
}
