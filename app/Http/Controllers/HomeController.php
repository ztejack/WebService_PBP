<?php

namespace App\Http\Controllers;

use App\Models\Gaji\GajiSubmit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(
            'home',
            [
                'auth' => Auth::user(),
                'employee_tetap_count' => User::whereHas('employee', function ($query) {
                    $query->whereHas('contract', function ($query) {
                        $query->whereIn('contract', ['TETAP']);
                    });
                })->where('username', '!=', 'superuser')->count(),
                'employee_pkwt_count' => User::whereHas('employee', function ($query) {
                    $query->whereHas('contract', function ($query) {
                        $query->whereNotIn('contract', ['TETAP', 'DIREKSI', 'KOMISARIS']);
                    });
                })->where('username', '!=', 'superuser')->count(),
                'direksi_count' => User::whereHas('employee', function ($query) {
                    $query->whereHas('contract', function ($query) {
                        $query->whereIn('contract', ['DIREKSI']);
                    });
                })->where('username', '!=', 'superuser')->count(),
                'komisaris_count' => User::whereHas('employee', function ($query) {
                    $query->whereHas('contract', function ($query) {
                        $query->whereIn('contract', ['KOMISARIS']);
                    });
                })->where('username', '!=', 'superuser')->count(),
                'submision_counting' => GajiSubmit::sum('total')
            ]
        );
    }
}
