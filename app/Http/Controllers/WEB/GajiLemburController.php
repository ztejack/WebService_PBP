<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gaji\GajiLembur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GajiLemburController extends Controller
{
    public function store($slug)
    {

        // try {
        $user = User::where('slug', $slug)->first();
        // dd($user->employee->lembur()->get());
        $lembur = $user->employee->lembur()->whereYear('date', '>=', now()->year)
            ->orWhere(function ($query) {
                $query->whereYear('date', now()->year)
                    ->whereMonth('date', '>=', now()->month);
            })->where('employe_id', $user->employee->id)->get()->first();
        // dd(request());
        // $this->lembur()->whereYear('date', '>=', now()->year)
        // ->orWhere(function ($query) {
        //     $query->whereYear('date', now()->year)
        //         ->whereMonth('date', '>=', now()->month);
        // })->get()->first();
        // dd($lembur);
        if ($lembur != null) {
            // if ($lembur->date->format('M Y') == now()->format('M Y')) {
            $lembur->update([
                'date' => request('date'),
                'jumlah' => request('jumlah_lembur')
            ]);
            return Redirect::back()->with('succ', 'Success Update Lembur')->withInput();
            // }
        }
        $lembur = GajiLembur::create(
            [
                'date' => request('date'),
                'employe_id' => $user->employee->id,
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
