<?php

namespace App\Http\Controllers;

use App\Models\Gaji\GajiSubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    public function index()
    {
        // try {
        // $this->authorize'AprovalGajiSpv';
        // dd($this->authorize('AprovalGajiSpv'));
        if (Gate::allows('AprovalGajiSU')) {
            $task = GajiSubmit::where('aprv_4', false)->Where('status', '!=', 'rejected')
                ->orderBy('updated_at', 'desc')->get();
            $task_history = GajiSubmit::where('status', 'aproved')
                ->orderBy('updated_at', 'desc')->get();
            return view('pages.Task.PageDataTask', [
                'payrolls' => $task,
                'payrolls_done' => $task_history
            ]);
        } elseif (Gate::allows('AprovalGajiSpv')) {
            $task = GajiSubmit::where('aprv_1', false)->Where('status', '!=', 'rejected')
                ->orderBy('updated_at', 'desc')->get();
            $task_history = GajiSubmit::where('aprv_1', true)->orWhere('status', 'rejected')
                ->orderBy('updated_at', 'desc')->get();
            return view('pages.Task.PageDataTask', [
                'payrolls' => $task,
                'payrolls_done' => $task_history
            ]);
        } elseif (Gate::allows('AprovalGajiAsmen')) {
            $task = GajiSubmit::where('aprv_1', true)->where('aprv_2', false)->Where('status', '!=', 'rejected')
                ->orderBy('updated_at', 'desc')->get();
            $task_history = GajiSubmit::where('aprv_2', true)->orWhere('status', 'rejected')->orWhere('aprv_1', true)
                ->orderBy('updated_at', 'desc')->get();
            return view('pages.Task.PageDataTask', [
                'payrolls' => $task,
                'payrolls_done' => $task_history
            ]);
        } elseif (Gate::allows('AprovalGajiGm')) {
            $task = GajiSubmit::where('aprv_2', true)->Where('status', '!=', 'rejected')
                ->where('aprv_3', false)
                ->orderBy('updated_at', 'desc')->get();
            $task_history = GajiSubmit::where('aprv_3', true)->orWhere('status', 'rejected')
                ->orderBy('updated_at', 'desc')->get();
            return view('pages.Task.PageDataTask', [
                'payrolls' => $task,
                'payrolls_done' => $task_history
            ]);
        } elseif (Gate::allows('AprovalGajiDirut')) {
            $task = GajiSubmit::where('aprv_3', true)->Where('status', '!=', 'rejected')
                ->where('aprv_4', false)
                ->orderBy('updated_at', 'desc')->get();
            $task_history = GajiSubmit::where('aprv_4', true)->orWhere('status', 'rejected')
                ->orderBy('updated_at', 'desc')->get();
            return view('pages.Task.PageDataTask', [
                'payrolls' => $task,
                'payrolls_done' => $task_history
            ]);
        }
        // } catch (\Exception $e) {
        //     dd($e);
        //     return Redirect::back()->with('err', 'Failed Update Gaji')->withInput();
        // }
    }
    public function aproval(GajiSubmit $task, Request $request)
    {
        try {
            if ($request->has('aprove') && $request->input('aprove')) {
                // val aproved
                if (!$task->aprv_1) {
                    $task->update([
                        'aprv_1' => true
                    ]);
                    // $task->save();

                    return Redirect::back()->with('succ', 'Success');
                } else if (!$task->aprv_2) {
                    $task->update([
                        'aprv_2' => true,
                    ]);
                    return Redirect::back()->with('succ', 'Success');
                } else if (!$task->aprv_3) {
                    $task->update([
                        'aprv_3' => true,
                    ]);
                    return Redirect::back()->with('succ', 'Success');
                } else if (!$task->aprv_4) {
                    $task->update([
                        'aprv_4' => true,
                        'status'=> 'aproved'
                    ]);
                    foreach ($task->gajislip as $slip) {
                        $slip->update(['status' => 'aproved']);
                        // $slip->save();
                    }
                    return Redirect::back()->with('succ', 'Success');
                } else {
                    return Redirect::back()->with('succ', 'Has been aproved ');
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
