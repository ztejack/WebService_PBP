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
        $user_end_contract = User::whereHas('employee', function ($query) {
            $twoMonthsFromNow = now()->addMonths(2);
            $query->where('date_end_contract', '<=', $twoMonthsFromNow);
        })->where('username', '!=', 'superuser')->where('username', '!=', 'adminpbp')->get();
        // $user_end_contract = User::whereHas('employee', function ($query) {
        //     $twoMonthsFromNow = now()->addMonths(2);
        //     $query->where('date_end_contract', '<=', $twoMonthsFromNow);
        // })->where('username', '!=', 'superuser')->where('username', '!=', 'adminpbp')->get();
        // dd($user_end_contract);
        return view(
            'home',
            [
                'auth' => Auth::user(),
                'employee_tetap_count' => User::whereHas('employee', function ($query) {
                    $query->whereHas('contract', function ($query) {
                        $query->whereIn('contract', ['TETAP']);
                    });
                })->where('username', '!=', 'superuser')->where('username', '!=', 'adminpbp')->count(),
                'employee_pkwt_count' => User::whereHas('employee', function ($query) {
                    $query->whereHas('contract', function ($query) {
                        $query->whereNotIn('contract', ['TETAP', 'DIREKSI', 'KOMISARIS']);
                    });
                })->where('username', '!=', 'superuser')->where('username', '!=', 'adminpbp')->count(),
                'direksi_count' => User::whereHas('employee', function ($query) {
                    $query->whereHas('contract', function ($query) {
                        $query->whereIn('contract', ['DIREKSI']);
                    });
                })->where('username', '!=', 'superuser')->where('username', '!=', 'adminpbp')->count(),
                'komisaris_count' => User::whereHas('employee', function ($query) {
                    $query->whereHas('contract', function ($query) {
                        $query->whereIn('contract', ['KOMISARIS']);
                    });
                })->where('username', '!=', 'superuser')->where('username', '!=', 'adminpbp')->count(),
                'submision_counting' => GajiSubmit::sum('total'),
                'user_end_contract' => $user_end_contract,

            ]
        );
    }
}
