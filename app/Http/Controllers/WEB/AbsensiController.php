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
            // $absen = Absensi::first();
            $absen = $user->employee->absensi->first();
            // dd($absen);
            if ($absen != null) {
                $absen = $user->employee->absensi->first();
                if ($absen->date->format('M Y') == now()->format('M Y')) {
                    // $absen->sakit += ;
                    $absen->update([
                        'sakit' => $absen->sakit + $request['sakit'],
                        'terlambat' => $absen->terlambat + $request['terlambat'],
                        'kosong' => $absen->kosong + $request['kosong'],
                        'perjalanan' => $absen->perjalanan + $request['perjalanan'],
                    ]);
                    return Redirect::back()->with('succ', 'Success Update Absen')->withInput();
                }
            }
            Absensi::create([
                'sakit' => $request['sakit'],
                'terlambat' => $request['terlambat'],
                'kosong' => $request['kosong'],
                'perjalanan' => $request['perjalanan'],
                'employe_id' => $user->employee->id,
                'date' => request('date')
            ]);
            return Redirect::back()->with('succ', 'Success Add Absen')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Add Absen')->withInput();
        }
    }
    public function update(Request $request, Absensi $absensi)
    {
        try {
            $absensi->update([
                'sakit' =>  $request['sakit'],
                'terlambat' => $request['terlambat'],
                'kosong' =>  $request['kosong'],
                'perjalanan' =>  $request['perjalanan'],
            ]);
            return Redirect::back()->with('succ', 'Success Update Absen')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Add Absen')->withInput();
        }
    }
}
