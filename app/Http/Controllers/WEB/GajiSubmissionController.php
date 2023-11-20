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
        try {
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
                    'gapok' => $employe->gaji->gapok,
                    'tnj_jabatan' => $employe->gaji->tnj_jabatan,
                    'tnj_ahli' => $employe->gaji->tnj_ahli,
                    'total_tnj_makan' => $gajicount->tnj_makan,

                    'tnj_perumahan' => $gajicount->tnj_perumahan,
                    'total_tnj_shift' => $gajicount->tnj_shift,
                    'total_tnj_transport' => $gajicount->tnj_transport,
                    'tnj_lapangan' => $gajicount->tnj_lapangan,

                    'tnj_bpjs_tk' => $gajicount->bpjs_var->tnj_bpjs_tk_P,
                    'tnj_bpjs_kes' => $gajicount->bpjs_var->tnj_bpjs_kes_P,
                    'pot_bpjs_tk' => $gajicount->bpjs_var->pot_bpjs_tk_E,
                    'pot_bpjs_kes' => $gajicount->bpjs_var->pot_bpjs_kes_E,
                    'pot_sakit' => $gajicount->potongan_lainnya->pot_sakit,
                    'pot_kosong' => $gajicount->potongan_lainnya->pot_kosong,
                    'pot_terlambat' => $gajicount->potongan_lainnya->pot_terlambat,
                    'pot_perjalanan' => $gajicount->potongan_lainnya->pot_perjalanan,

                    'total' => $gajicount->total,
                    'status' => 'Pending',
                    'employe_id' => $employe->id,
                    'gaji_submit_id' => $GajiSubmit->id,
                ]);
            }
            $GajiSubmit->update([
                'total' => $total,
                'jumlah' => $jml,
                'status' => "Pending",
            ]);
            $GajiSubmit->save();

            return redirect()->route('page_gaji')->with('succ', 'Success Sumbit')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with(['err' => $e])->withInput();
        }
    }
    public function view_update(GajiSubmit $submission, Request $request)
    {
        // dd($submission->gajislip);
        $users = User::all();
        $gajis = Gaji::all();
        return view('pages.Gaji.Submission.PageUpdateSubmission', [
            'users' => $users,
            'gaji' => $gajis,
            'data' => $submission,
        ]);
        // return redirect()->route('page_gaji')->with('succ', 'Success Sumbit')->withInput();
    }
    public function update(GajiSubmit $submission, Request $request)
    {
        try {
            $employes = $request['submisiions'];

            $submitemploye = $submission->employe;
            foreach ($submitemploye as $item) {
                $submission->employe()->detach($item);
            }
            $gajislips = $submission->gajislip;
            foreach ($gajislips as $item) {
                $item->delete();
            }

            $total = 0;
            $jml = 0;
            foreach ($employes as $item) {
                $employe = Employe::where('id', $item)->get()->first();
                $jml += 1;
                // $total = $total + $employe->gajicount();
                $gajicount = $employe->gajicount();
                $total = $total += $gajicount->total;
                GajiSlip::create([
                    'date' => $request['date'],
                    'gapok' => $employe->gaji->gapok,
                    'tnj_jabatan' => $employe->gaji->tnj_jabatan,
                    'tnj_ahli' => $employe->gaji->tnj_ahli,
                    'total_tnj_makan' => $gajicount->tnj_makan,

                    'tnj_perumahan' => $gajicount->tnj_perumahan,
                    'tnj_shift' => $gajicount->tnj_shift,
                    'total_tnj_transport' => $gajicount->tnj_transport,
                    'tnj_lapangan' => $gajicount->tnj_lapangan,
                    'lembur' => $gajicount->lembur,
                    'tnj_bpjs_tk' => $gajicount->bpjs_var->tnj_bpjs_tk_P,
                    'tnj_bpjs_kes' => $gajicount->bpjs_var->tnj_bpjs_kes_P,
                    'pot_bpjs_tk' => $gajicount->bpjs_var->pot_bpjs_tk_E,
                    'pot_bpjs_kes' => $gajicount->bpjs_var->pot_bpjs_kes_E,
                    'pot_sakit' => $gajicount->potongan_lainnya->pot_sakit,
                    'pot_kosong' => $gajicount->potongan_lainnya->pot_kosong,
                    'pot_terlambat' => $gajicount->potongan_lainnya->pot_terlambat,
                    'pot_perjalanan' => $gajicount->potongan_lainnya->pot_perjalanan,

                    'total' => $gajicount->total,

                    'status' => 'Pending',
                    'employe_id' => $employe->id,
                    'gaji_submit_id' => $submission->id,

                ]);
            }

            $submission->update([
                'payroll' => $request['date'],
                'total' => $total,
                'jumlah' => $jml,
            ]);
            return redirect()->route('page_gaji')->with('succ', 'Success Sumbit')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Failed Sumbit')->withInput();
        }
    }
    public function destroy(GajiSubmit $submission)
    {
        try {
            $submission->delete();
            return redirect()->route('page_gaji')->with('succ', 'Success Delete')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Failed Delete')->withInput();
        }
    }
    public function show(GajiSubmit $submission)
    {
        return view('pages.Gaji.Submission.PageDetailSubmission', [
            'users' => User::all(),
            'payrol' => $submission,
        ]);
    }
}
