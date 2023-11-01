<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gaji\Absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AbsensiController extends Controller
{
    public function store(Request $request, $slug)
    {
        try {

            $user = User::where('slug', $slug)->first();
            // dd($request);
            Absensi::create([
                'sakit' => $request['sakit'],
                'terlambat' => $request['terlambat'],
                'kosong' => $request['kosong'],
                'perjalanan' => $request['perjalanan'],
                'employe_id' => $user->employee->id
            ]);
            return Redirect::back()->with('succ', 'Success Add Absen')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Add Absen')->withInput();
        }
    }
}
