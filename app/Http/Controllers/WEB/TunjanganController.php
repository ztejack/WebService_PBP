<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Gaji\Gaji;
use App\Models\Gaji\Tunjangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TunjanganController extends Controller
{
    public function store(Request $request, Gaji $gaji)
    {
        // dd($request);
        // $validatedData = Validator::make($request->all(), [
        //     'nama_tunjangan' => 'required|max:255',
        //     'jumlah' => 'required|max:255',
        //     'nama_tunjangan' => 'required|max:255',
        // ]);
        // // dd($validatedData);
        // if ($validatedData->fails()) {
        //     // return Redirect::back()->with('errors', 0)->withInput();
        //     return Redirect::back()->withErrors($validatedData)->withInput();
        // }
        // dd($gaji);
        $tunjangan = Tunjangan::create([
            'nama_tnj' => $request->input('namatunjangan'),
            'jumlah_tnj' => $request->input('jumlahtunjangan'),
            'gaji_id' => $gaji->id,
        ]);

        if ($tunjangan) {
            return redirect()->back()->with('success', 'Tunjangan created successfully');
        } else {
            return redirect()->back()->with('error', 'Tunjangan creation failed')->withInput();
        }
    }
}
