<?php

namespace App\Http\Controllers;

use App\Models\Gaji\GajiSubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    public function index()
    {
        return view('pages.Task.PageDataTask', [
            'payrolls' => GajiSubmit::where('aprv_1', false)->where('status', 'pending')->orderBy('updated_at', 'desc')->get(),
            'payrolls_aprv_1' => GajiSubmit::where('aprv_1', true)->where('status', 'pending')->orderBy('updated_at', 'desc')->get(),
            'payrolls_done' => GajiSubmit::where('status', '=', 'aproved')->orderBy('updated_at', 'desc')->get(),
        ]);
    }
    public function aproval(GajiSubmit $task, Request $request)
    {
        try {
            if ($request->has('aprove') && $request->input('aprove')) {
                // val aproved
                if ($task->aprv_1 == true) {
                    $task->update([
                        'aprv_2' => true,
                        'status' => 'aproved'
                    ]);
                    // $task->save();
                    foreach ($task->gajislip as $slip) {
                        $slip->update(['status' => 'aproved']);
                        // $slip->save();
                    }
                    return Redirect::back()->with('succ', 'Success');
                } else {
                    $task->update([
                        'aprv_1' => true
                    ]);
                    // $task->save();
                    // dd($task);
                    return Redirect::back()->with('succ', 'Success');
                }
            }
            if ($request->has('rejected') && $request->input('rejected')) {
                // val rejected
                $task->update([
                    'status' => 'rejected'
                ]);
                foreach ($task->gajislip as $slip) {
                    $slip->update(['status' => 'rejected']);
                    // $slip->save();
                }
                // $task->save();
                return Redirect::back()->with('succ', 'Success');
            }
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Failed Update Gaji')->withInput();
        }
    }
}
