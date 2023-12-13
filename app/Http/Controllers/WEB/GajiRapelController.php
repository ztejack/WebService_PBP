<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Gaji\GajiRapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GajiRapelController extends Controller
{
    public function store($slug)
    {

        try {
            $user = User::where('slug', $slug)->first();
            $rapel = $user->employee->rapel->first();
            if ($rapel != null) {
                if ($rapel->date->format('M Y') == now()->format('M Y')) {
                    $rapel->update([
                        'date' => request('date'),
                        'jumlah' => request('jumlah_rapel')
                    ]);
                    return Redirect::back()->with('succ', 'Success Update Rapel')->withInput();
                }
            }
            $rapel = GajiRapel::create(
                [
                    'date' => request('date'),
                    'employe_id' => $user->employee->id,
                    'jumlah' => request('jumlah_rapel'),
                ]
            );
            return Redirect::back()->with('succ', 'Success Add Rapel')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Add Rapel')->withInput();
        }
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}
