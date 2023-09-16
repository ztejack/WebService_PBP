<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParamController extends Controller
{
    public function index()
    {
        //
    }


    /**
     * Satker
     *
     * @return void
     */
    public function satker_view()
    {
        return view('pages.Satker.PageDataSatker');
    }
    public function satker_store()
    {
        //
    }
    public function satker_update()
    {
        //
    }
    public function satker_destroy()
    {
        //
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
    public function contract_store()
    {
        //
    }
    public function contract_update()
    {
        //
    }
    public function contract_destroy()
    {
        //
    }
}
