<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gaji\GajiLembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GajiLemburController extends Controller
{
    public function store($uuid)
    {

        // try {
        $employe = Employe::where('uuid', $uuid)->first();
        $lembur = $employe->lembur->first();
        if ($lembur != null) {
            if ($lembur->date->format('M Y') == now()->format('M Y')) {
                $lembur->update([
                    'date' => request('date'),
                    'jumlah' => request('jumlah_lembur')
                ]);
                return Redirect::back()->with('succ', 'Success Update Lembur')->withInput();
            }
        }
        $lembur = GajiLembur::create(
            [
                'date' => request('date'),
                'employe_id' => $employe->id,
                'jumlah' => request('jumlah_lembur'),
            ]
        );
        return Redirect::back()->with('succ', 'Success Add Lembur')->withInput();
        // } catch (\Exception $e) {
        //     return Redirect::back()->with('err', 'Failed Add Lembur')->withInput();
        // }
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}
