<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gaji\Gaji;
use App\Models\User;
use Illuminate\Http\Request;

class GajiSubmissionController extends Controller
{
    public function view_store(Request $request)
    {
        $users = User::all();
        $gajis = Gaji::all();
        return view('pages.Gaji.Submission.PageAddSubmission', [
            'users' => $users,
            'gaji' => $gajis,
        ]);
    }
    public function store(Request $request)
    {
        dd($request);
    }
}
