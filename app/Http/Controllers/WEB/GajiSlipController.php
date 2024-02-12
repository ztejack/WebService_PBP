<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGajiSlipRequest;
use App\Http\Requests\UpdateGajiSlipRequest;
use App\Models\Gaji\GajiSlip;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as FacadesLaravelMpdf;
use Mccarlosen\LaravelMpdf\LaravelMpdf;
// use Barryvdh\DomPDF\Facade\Pdf;
// use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

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

    public function detail_slip_gaji(GajiSlip $slip)
    {
        $employe = $slip->employee;
        return view('pages.Gaji.Slip.PageDetailSlip', [
            'slip' => $slip,
            'employe' => $employe
        ]);
    }

    public function print_slip_gaji(GajiSlip $slip)
    {
        $employe = $slip->employee;
        // return view('pages.Gaji.Slip.PageTestPrintPDF');
        return view('pages.Gaji.Slip.PagePrintDetailslip', [
            'slip' => $slip,
            'employe' => $employe
        ]);
    }
    public function print_slip_gaji_pdf(GajiSlip $slip)
    {
        $employe = $slip->employee;
        $filename = 'demo.pdf';

        // return view('pages.Gaji.Slip.PageTestPrintPDF', [
        //     'slip' => $slip,
        //     'employe' => $employe
        // ]);
        // Barly/DomPDF
        // $pdf = Pdf::loadView('pages.Gaji.Slip.PageTestPrintPDF', [
        //     'slip' => $slip,
        //     'employe' => $employe
        // ]);
        // return $pdf->download('slip.pdf');

        // dompf/dompdf
        // $pdf = PDF::loadView('pages.Gaji.Slip.PageTestPrintPDF', [
        $pdf = FacadesLaravelMpdf::loadView('pages.Gaji.Slip.PageTestPrintPDF', [
            'slip' => $slip,
            'employe' => $employe
        ]);

        return $pdf->stream('document.pdf');
    }
}
