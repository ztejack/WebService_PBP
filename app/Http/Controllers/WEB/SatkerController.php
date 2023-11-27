<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    public function index(){
        return view('pages.Satker.PageDataSatker');
    }
}
