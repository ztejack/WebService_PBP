<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Gaji\Gaji;
use App\Models\Gaji\Tunjangan;
use App\Models\Gaji\Tunjangan_lain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TunjanganController extends Controller
{
    public function store(Request $request)
    {
        $tunjangan = Tunjangan_lain::create([
            'nama_tnj' => $request->input('name'),
            'jenis_tnj' => $request->input('type'),
            'jumlah_tnj' => $request->input('jumlah'),
        ]);

        if ($tunjangan) {
            return redirect()->back()->with('succ', 'Tunjangan created successfully');
        } else {
            return redirect()->back()->with('err', 'Tunjangan creation failed')->withInput();
        }
    }
}
