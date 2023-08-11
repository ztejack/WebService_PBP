<?php

namespace App\Http\Controllers;

use App\Models\employe;
use App\Http\Requests\StoreemployeRequest;
use App\Http\Requests\UpdateemployeRequest;

class EmployeController extends Controller
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
     * @param  \App\Http\Requests\StoreemployeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreemployeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateemployeRequest  $request
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateemployeRequest $request, employe $employe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(employe $employe)
    {
        //
    }
}
