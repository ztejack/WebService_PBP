<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Golongan;
use App\Models\Position;
use App\Models\Satker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Ui\Presets\React;

class ParamController extends Controller
{
    public function employe_param_view()
    {
        $satkers = Satker::all();
        $positions = Position::all();
        $contracs = Contract::all();
        $golongans = Golongan::all();
        $golongans = Golongan::all();

        return view('pages.EmployeParam.PageDataEmployeParam', [
            'satkers' => $satkers,
            'positions' => $positions,
            'contracs' => $contracs,
            'golongans' => $golongans,
        ]);
    }


    /**
     * Satker
     *
     * @return void
     */
    public function satker_view()
    {
    }
    public function satker_store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'satker' => 'required|unique:satkers|max:255',
        ]);
        if ($validatedData->fails()) {
            return Redirect::back()->withErrors($validatedData)->withInput();
        }
        // dd($request['satker']);
        $satker = Satker::create(['satker' => $request->satker]);
        if ($satker) {
            return redirect()->back()->with('success', 'Satker created successfully');
        } else {
            return redirect()->back()->with('err', 'Satker creation failed')->withInput();
        }
    }
    public function satker_update(Request $request, Satker $satker)
    {
        $satkername = $request['satkername'];
        $validationRules = [
            $satkername => [
                'required',
                'string',
                Rule::unique('satkers', 'satker')->ignore($satker->id),
            ],
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // return Redirect::back()->with('errors', 0)->withInput();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        try {
            $satker->update(['satker' => $request[$satkername]]);
            return redirect()->back()->with('success', '')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Satker creation failed')->withInput();
        }
    }
    public function satker_destroy(Request $request, Satker $satker)
    {
        if (in_array($satker->name, ['Guest'])) {
            return Redirect::back()->with('err', 'Satker ini tidak dapat di hapus')->withInput();
        };
        try {
            $satker->delete();
            return redirect()->back()->with('succ', 'Berhasil Menghapus Satker')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Gagal Menghapus Satker')->withInput();
        }
    }


    /**
     * Contract
     *
     * @return void
     */
    public function contract_view()
    {
        //
    }
    public function contract_store(Request $request)
    {
        // dd($request);
        $validatedData = Validator::make($request->all(), [
            'contract' => 'required|unique:contracts|max:255',
        ]);
        if ($validatedData->fails()) {
            return Redirect::back()->withErrors($validatedData)->withInput();
        }
        // dd($request['contract']);
        $contract = Contract::create(['contract' => $request->contract]);
        if ($contract) {
            return redirect()->back()->with('succ', 'Contract created successfully');
        } else {
            return redirect()->back()->with('err', 'Contract creation failed')->withInput();
        }
    }
    public function contract_update(Request $request, Contract $contract)
    {
        $contractname = $request['contractname'];
        $validationRules = [
            $contractname => [
                'required',
                'string',
                Rule::unique('contracts', 'contract')->ignore($contract->id),
            ],
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // return Redirect::back()->with('errors', 0)->withInput();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        try {
            $contract->update(['contract' => $request[$contractname]]);
            return redirect()->back()->with('success', '')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Contract creation failed')->withInput();
        }
    }
    public function contract_destroy(Request $request, Contract $contract)
    {
        try {
            $contract->delete();
            return redirect()->back()->with('succ', 'Success Deleting Contract')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Deleting Contract Failed')->withInput();
        }
    }

    /**
     * position
     *
     * @return void
     */
    public function position_view()
    {
        //
    }
    public function position_store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'position' => 'required|unique:positions|max:255',
        ]);
        if ($validatedData->fails()) {
            return Redirect::back()->withErrors($validatedData)->withInput();
        }
        $position = Position::create(['position' => $request->position]);
        if ($position) {
            return redirect()->back()->with('succ', 'Position created successfully');
        } else {
            return redirect()->back()->with('err', 'Position creation failed')->withInput();
        }
    }
    public function position_update(Request $request, Position $position)
    {
        $positionname = $request['positionname'];
        $validationRules = [
            $positionname => [
                'required',
                'string',
                Rule::unique('positions', 'position')->ignore($position->id),
            ],
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // return Redirect::back()->with('errors', 0)->withInput();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        try {
            $position->update(['position' => $request[$positionname]]);
            return redirect()->back()->with('success', '')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Satker creation failed')->withInput();
        }
    }
    public function position_destroy(Request $request, Position $position)
    {
        try {
            $position->delete();
            return redirect()->back()->with('succ', 'Succes  Position')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Deleting Position Failed')->withInput();
        }
    }

    /**
     * position
     *
     * @return void
     */
    public function golongan_view()
    {
        //
    }
    public function golongan_store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'golongan' => 'required|unique:golongans|max:255',
        ]);
        if ($validatedData->fails()) {
            return Redirect::back()->withErrors($validatedData)->withInput();
        }
        $golongan = Golongan::create(['golongan' => $request->golongan]);
        if ($golongan) {
            return redirect()->back()->with('succ', 'Golongan created successfully');
        } else {
            return redirect()->back()->with('err', 'Golongan creation failed')->withInput();
        }
    }
    public function golongan_update(Request $request, Golongan $golongan)
    {
        $golonganname = $request['golonganname'];
        $validationRules = [
            $golonganname => [
                'required',
                'string',
                Rule::unique('golongans', 'golongan')->ignore($golongan->id),
            ],
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // return Redirect::back()->with('errors', 0)->withInput();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        try {
            $golongan->update(['golongan' => $request[$golonganname]]);
            return redirect()->back()->with('success', '')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('err', 'Satker creation failed')->withInput();
        }
    }
    public function golongan_destroy(Request $request, Golongan $golongan)
    {
        try {
            $golongan->delete();
            return redirect()->back()->with('succ', 'Succes  Golongan')->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('err', 'Deleting Golongan Failed')->withInput();
        }
    }
}
