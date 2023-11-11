<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gaji\Gaji;
use App\Models\Gaji\GajiSubmit;
use App\Models\Gaji\GajiSlip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GajiSubmissionController extends Controller
{
    public function view_store(Request $request)
    {
        $users = User::all();
        $gajis = Gaji::all();
        // dd($gajis);
        // dd($users);
        // foreach ($users as $user) {
        //     dd($user->employee->gajicount());
        // };
        return view('pages.Gaji.Submission.PageAddSubmission', [
            'users' => $users,
            'gaji' => $gajis,
        ]);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        // dd($request);
        $employes = $request['submisiions'];
        // dd($employes);
        $total = 0;
        $jml = 0;
        $GajiSubmit = GajiSubmit::create([
            'payroll' => $request['date'],
            'name' => $user->name,
        ]);
        foreach ($employes as $item) {
            $employe = Employe::where('id', $item)->get()->first();
            $jml += 1;
            $gajicount = $employe->gajicount();
            // dd($gajicount->tnj_makan);
            $total = $total += $gajicount->total;
            GajiSlip::create([
                'date' => $request['date'],
                'gapok' => $user->employee->gaji->gapok,
                'tnj_jabatan' => $user->employee->gaji->tnj_jabatan,
                'tnj_ahli' => $user->employee->gaji->tnj_ahli,
                'total_tnj_makan' => $gajicount->tnj_makan,

                'tnj_perumahan' => $gajicount->tnj_perumahan,
                'total_tnj_transport' => $gajicount->tnj_transport,
                'status' => 'Pending',
                'employe_id' => $user->employee->id,
                'submit_id' => $GajiSubmit->id,
            ]);
        }
        $GajiSubmit->update([
            'total' => $total,
            'jumlah' => $jml,
            'status' => "Pending",
        ]);
        $GajiSubmit->save();
        return redirect()->route('page_gaji')->with('succ', 'Success Sumbit')->withInput();
    }
    public function update(GajiSubmit $gaji, Request $request)
    {
        $user = Auth::user();
        // dd($request);
        $employes = $request['submisiions'];
        // dd($employes);
        $total = 0;
        $jml = 0;
        foreach ($employes as $item) {
            $employe = Employe::where('id', $item)->get()->first();
            $jml += 1;
            $total = $total + $employe->totalgaji();
        }

        GajiSubmit::create([
            'payroll' => $request['date'],
            'name' => $user->name,
            'total' => $total,
            'jumlah' => $jml,
            'status' => "Pending",
        ]);
        return redirect()->route('page_gaji')->with('succ', 'Success Sumbit')->withInput();
    }
}
