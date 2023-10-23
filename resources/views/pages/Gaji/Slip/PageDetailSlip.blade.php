@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row invoice-preview">
                <!-- Invoice -->
                <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                    <div class="card invoice-preview-card">
                        <div class="card-body">
                            <div class="d-flex flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                                <div class="mb-xl-0 align-self-center">
                                    <div
                                        class="d-flex flex-column align-items-center align-content-center svg-illustration  align-self-center">
                                        <span class="app-brand-logo demo">
                                            <img src="{{ asset('img/logo/LOGO-PAGE-2.png') }}" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-center m-auto">
                                    <h3>PT.PELABUHAN BUKIT PRIMA</h3>
                                    <span>Jl. Soekarno Hatta Km 15 Bandar Lampung</span>
                                    <span>Gedung Terpadu Bukit Asam Coal Terminal Lt. 4</span>
                                    <span>e-mail : info@pelabuhanbukitprima.co.id, Phone :(0721) 3400003</span>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="card-body">
                            <div class="row p-sm-3 p-0">
                                <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="pe-3">Periode</td>
                                                <td>: FEBRUARI 2023</td>
                                            </tr>
                                            <tr>
                                                <td class="pe-3">Karyawan</td>
                                                <td>: Nama</td>
                                            </tr>
                                            <tr>
                                                <td class="pe-3">Jabatan</td>
                                                <td>: Staff Operasi</td>
                                            </tr>
                                            <tr>
                                                <td class="pe-3">Status</td>
                                                <td>: 0</td>
                                            </tr>
                                            <tr>
                                                <td class="pe-3">Golongan</td>
                                                <td>: 0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr class="m-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 border-end">
                                    <span class="fw-semibold ">GAJI</span>
                                    <ul class="list-group list-group-timeline">
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Gaji Pokok</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Tunjangan Jabatan</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Tunjangan Makan</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Tunjangan Bantuan Perumahan</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Tunjangan Transportasi</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Tunjangan BPJS Tenaga Kerja</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Tunjangan BPJS Kesehatan</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Gaji Pokok</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                    </ul>


                                </div>
                                <div class="col-lg-6 ">
                                    <span class="fw-semibold ">POTONGAN</span>
                                    <ul class="list-group list-group-timeline">
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Iuran BPJS Tenaga Kerja</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Iuran BPJS Kesehatan</span> <span>2,79000</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 ">
                                    <hr class="my-1">
                                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                        <div class="d-flex justify-content-between">
                                            <span class="fw-semibold ">JUMLAH GAJI</span>
                                            <span class="me-3 fw-semibold">2,79000</span>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-lg-6 ">
                                    <hr class="my-1">
                                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                        <div class="d-flex justify-content-between">
                                            <span class="fw-semibold ">JUMLAH POTONGAN</span>
                                            <span class="me-3 fw-semibold">2,79000</span>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-timeline">
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>JUMLAH GAJI</span> <span class="numbers">27900000</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>JUMLAH POTONGAN</span> <span class="numbers">27900000</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr class="my-2">
                                    <span class=" py-0 my-0">
                                        <div class="d-flex justify-content-between">
                                            <span class="fw-semibold ">TOTAL DITERIMA KARYAWAN</span>
                                            <span id="ttlterima" class="d-none hidden" hidden>3270560</span>
                                            <span class="me-3 fw-semibold numbers">3270560</span>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-12 my-2">
                                    <span class="fw-medium ">Terbilang:</span>
                                    <span id="spelling"></span>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card-body">
                            <div class="row">

                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- /Invoice -->

                <!-- Invoice Actions -->
                <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                    <div class="card">
                        <div class="card-body">
                            {{-- <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                                data-bs-target="#sendInvoiceOffcanvas">
                                <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                        class="bx bx-paper-plane bx-xs me-1"></i>Send Invoice</span>
                            </button>
                            <button class="btn btn-label-secondary d-grid w-100 mb-3">
                                Download
                            </button> --}}
                            <a class="btn btn-label-secondary d-grid w-100 mb-3" target="_blank"
                                href="{{ route('page_print_slip_gaji') }}">
                                Print
                            </a>

                        </div>
                    </div>
                </div>
                <!-- /Invoice Actions -->

            </div>
        </div>
    </div>
@endsection
