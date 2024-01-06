<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gaji\Gaji;
use App\Models\Gaji\GajiSubmit;
use App\Models\Gaji\GajiSlip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Util\Json;

class GajiSubmissionController extends Controller
{
    public function view_store(Request $request)
    {

        // $months = collect(range(1, 12))->map(function ($month) {
        //     return Carbon::create()->month($month)->format('M');
        // })->toArray();
        $currentMonth = Carbon::now();
        $selectedMonths = [];

        // Get three months before the current month
        for ($i = 2; $i >= 1; $i--) {
            $selectedMonths[] = $currentMonth->copy()->subMonths($i)->format('M');
        }

        // Get the current month
        $selectedMonths[] = $currentMonth->format('M');

        // Get three months after the current month
        for ($i = 1; $i <= 3; $i++) {
            $selectedMonths[] = $currentMonth->copy()->addMonths($i)->format('M');
        }
        // dd((object)$months);
        $users = User::all()->where('username', '!=', 'superuser');
        $collectionuser = $users->map(function ($user) {
            return $this->user_resource($user);
        });
        // $users = User::whereHas('employee', function ($query) {
        //     $query->whereHas('contract', function ($query) {
        //         $query->where('contract', '!=', 'direksi');
        //     });
        // })->where('username', '!=', 'superuser')->get();
        // $collectionuser = $users->map(function ($user) {
        //     return $this->user_resource($user);
        // });
        $users = User::whereHas('employee', function ($query) {
            $query->whereHas('contract', function ($query) {
                $query->where('contract', 'direksi');
            });
        })->where('username', '!=', 'superuser')->get();
        $collectionuserdireksi = $users->map(function ($user) {
            return $this->user_resource($user);
        });
        return view('pages.Gaji.Submission.PageAddSubmission',  [
            'users' => $collectionuser,
            'userdireksis' => $collectionuserdireksi,
            'months' => (object) $selectedMonths
        ]);
    }
    public function store(Request $request)
    {
        try {
            $validationRule = Validator::make($request->all(), [
                'submisiions' => 'required',
            ]);
            if ($validationRule->fails()) {
                return Redirect::back()->with(['err' => 'Please check some employe'])->withInput();
            }
            $user = Auth::user();
            $employes = $request['submisiions'];
            $total = 0;
            $jml = 0;
            $GajiSubmit = GajiSubmit::create([
                'payroll' => $request['date'],
                'name' => $user->name,
            ]);

            foreach ($employes as $item) {
                $employe = Employe::where('id', $item)->get()->first();
                if ($employe->contract->contract == "DIREKSI") {
                    $jml += 1;
                    $gajicount = $employe->gaji()->first();
                    // dd($gajicount);
                    $rapels = $employe->getcurrentrapel();
                    $rapel = $rapels == null ? 0 : $rapels->jumlah;
                    // dd($gajicount->tnj_makan);
                    $total = $total += $gajicount->total_gaji;

                    GajiSlip::create([
                        'date' => $request['date'],
                        'gapok' => $employe->gaji->gapok,
                        'tnj_jabatan' => $employe->gaji->tnj_jabatan,
                        'tnj_lain' => $gajicount->tnj_lain,

                        'tnj_perumahan' => $gajicount->tnj_perumahan,
                        'tnj_bantuan_perumahan' => $gajicount->tnj_bantuan_perumahan,
                        'tnj_dana_pensiun' => $gajicount->tnj_dana_pensiun,
                        'tnj_simmode' => $gajicount->tnj_simmode,
                        'tnj_pajak' => $gajicount->tnj_pajak,

                        'tnj_bpjs_tk' => $gajicount->tnj_bpjs_tk,
                        'tnj_bpjs_jkm' => $gajicount->tnj_bpjs_jkm,
                        'tnj_bpjs_jht' => $gajicount->tnj_bpjs_jht,
                        'tnj_bpjs_jp' => $gajicount->tnj_bpjs_jp,
                        'tnj_bpjs_kes' => $gajicount->tnj_bpjs_kes,
                        'pot_bpjs_tk' => $gajicount->pot_bpjs_tk,
                        'pot_bpjs_jkm' => $gajicount->pot_bpjs_jkm,
                        'pot_bpjs_jht' => $gajicount->pot_bpjs_jht,
                        'pot_bpjs_jp' => $gajicount->pot_bpjs_jp,
                        'pot_bpjs_kes' => $gajicount->pot_bpjs_kes,

                        'pot_serikat_pegawai_ba' => $gajicount->pot_serikat_pegawai_ba,
                        'pot_koperasi' => $gajicount->pot_koperasi,
                        'pot_lazis' => $gajicount->pot_lazis,
                        'pot_dana_pensiun' => $gajicount->pot_dana_pensiun,
                        'pot_premi_jht' => $gajicount->pot_premi_jht,
                        'pot_tht' => $gajicount->pot_tht,
                        'pot_taspen' => $gajicount->pot_taspen,
                        'pot_pajak' => $gajicount->pot_pajak,
                        'pot_simmode' => $gajicount->pot_simmode,
                        'pot_lain' => $gajicount->pot_lain,

                        'rapel' => $rapel,
                        'total' => $total,

                        'employe_id' => $employe->id,
                        'gaji_submit_id' => $GajiSubmit->id,
                    ]);
                }
                if ($employe->contract->contract != "DIREKSI") {
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
                        'tnj_lain' => $gajicount->tnj_lain,
                        'rapel' => $gajicount->rapel,
                        'lembur' => $gajicount->lembur,

                        'tnj_bpjs_tk' => $gajicount->bpjs_var->tnj_bpjs_tk_P,
                        'tnj_bpjs_kes' => $gajicount->bpjs_var->tnj_bpjs_kes_P,
                        'pot_bpjs_tk' => $gajicount->bpjs_var->pot_bpjs_tk_E,
                        'pot_bpjs_kes' => $gajicount->bpjs_var->pot_bpjs_kes_E,
                        'pot_sakit' => $gajicount->potongan_lainnya->pot_sakit,
                        'pot_kosong' => $gajicount->potongan_lainnya->pot_kosong,
                        'pot_terlambat' => $gajicount->potongan_lainnya->pot_terlambat,
                        'pot_perjalanan' => $gajicount->potongan_lainnya->pot_perjalanan,

                        'total' => round($gajicount->total),
                        'status' => 'Pending',
                        'employe_id' => $employe->id,
                        'gaji_submit_id' => $GajiSubmit->id,
                    ]);
                }
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
    public function store_direksi(Request $request)
    {
        // dd($request);
        try {
            $validationRule = Validator::make($request->all(), [
                'submisiions' => 'required',
            ]);
            if ($validationRule->fails()) {
                return Redirect::back()->with(['err' => 'Please check some employe'])->withInput();
            }
            $user = Auth::user();
            // dd($request);
            $employes = $request['submisiions'];
            // dd($employes);
            $total = 0;
            $jml = 0;
            // $date = '2024-01-04'
            $GajiSubmit = GajiSubmit::create([
                'payroll' => $request['date'],
                'name' => $user->name,
            ]);
            foreach ($employes as $item) {
                $employe = Employe::where('id', $item)->get()->first();
                $jml += 1;
                $gajicount = $employe->gaji()->first();
                // dd($gajicount);
                $rapels = $employe->getcurrentrapel();
                $rapel = $rapels == null ? 0 : $rapels->jumlah;
                // dd($gajicount->tnj_makan);
                $total = $total += $gajicount->total_gaji;

                GajiSlip::create([
                    'date' => $request['date'],
                    'gapok' => $employe->gaji->gapok,
                    'tnj_jabatan' => $employe->gaji->tnj_jabatan,
                    'tnj_lain' => $gajicount->tnj_lain,

                    'tnj_perumahan' => $gajicount->tnj_perumahan,
                    'tnj_bantuan_perumahan' => $gajicount->tnj_bantuan_perumahan,
                    'tnj_dana_pensiun' => $gajicount->tnj_dana_pensiun,
                    'tnj_simmode' => $gajicount->tnj_simmode,
                    'tnj_pajak' => $gajicount->tnj_pajak,

                    'tnj_bpjs_tk' => $gajicount->tnj_bpjs_tk,
                    'tnj_bpjs_jkm' => $gajicount->tnj_bpjs_jkm,
                    'tnj_bpjs_jht' => $gajicount->tnj_bpjs_jht,
                    'tnj_bpjs_jp' => $gajicount->tnj_bpjs_jp,
                    'tnj_bpjs_kes' => $gajicount->tnj_bpjs_kes,
                    'pot_bpjs_tk' => $gajicount->pot_bpjs_tk,
                    'pot_bpjs_jkm' => $gajicount->pot_bpjs_jkm,
                    'pot_bpjs_jht' => $gajicount->pot_bpjs_jht,
                    'pot_bpjs_jp' => $gajicount->pot_bpjs_jp,
                    'pot_bpjs_kes' => $gajicount->pot_bpjs_kes,

                    'pot_serikat_pegawai_ba' => $gajicount->pot_serikat_pegawai_ba,
                    'pot_koperasi' => $gajicount->pot_koperasi,
                    'pot_lazis' => $gajicount->pot_lazis,
                    'pot_dana_pensiun' => $gajicount->pot_dana_pensiun,
                    'pot_premi_jht' => $gajicount->pot_premi_jht,
                    'pot_tht' => $gajicount->pot_tht,
                    'pot_taspen' => $gajicount->pot_taspen,
                    'pot_pajak' => $gajicount->pot_pajak,
                    'pot_simmode' => $gajicount->pot_simmode,
                    'pot_lain' => $gajicount->pot_lain,

                    'rapel' => $rapel,
                    'total' => $total,

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
        $users = User::all()->where('username', '!=', 'superuser');
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
        // dd($submission);
        // try {
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
                'tnj_lain' => $gajicount->tnj_lain,
                'rapel' => $gajicount->rapel,
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
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('err', 'Failed Sumbit')->withInput();
        // }
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
            'users' => User::all()->where('username', '!=', 'superuser'),
            'payrol' => $submission,
        ]);
    }
    public function user_resource($user)
    {
        $absensi = $user->employee->absensiForCurrentMonth();

        $data = [
            'slug' => $user->slug,
            'employee' => $user->employee,
            'name' => $user->name,
            'position' => $user->employee->position != null ? $user->employee->position->position : null,
            'golongan' => $user->employee->golongan != null ? $user->employee->golongan->golongan : null,
            'employe_uuid' => $user->employee->uuid,
            'absensi' => $absensi,
            'lembur' => $user->getcurrentlembur(),
        ];
        return (object)$data;
    }
}
