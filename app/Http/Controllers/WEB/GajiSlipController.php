<?php

namespace App\Http\Controllers;

use App\Models\GajiSlip;
use App\Http\Requests\StoreGajiSlipRequest;
use App\Http\Requests\UpdateGajiSlipRequest;

class GajiSlipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGajiSlipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGajiSlipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GajiSlip  $gajiSlip
     * @return \Illuminate\Http\Response
     */
    public function show(GajiSlip $gajiSlip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GajiSlip  $gajiSlip
     * @return \Illuminate\Http\Response
     */
    public function edit(GajiSlip $gajiSlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGajiSlipRequest  $request
     * @param  \App\Models\GajiSlip  $gajiSlip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGajiSlipRequest $request, GajiSlip $gajiSlip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GajiSlip  $gajiSlip
     * @return \Illuminate\Http\Response
     */
    public function destroy(GajiSlip $gajiSlip)
    {
        //
    }
}
