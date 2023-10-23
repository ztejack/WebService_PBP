@extends('layouts.blank')

@section('content')
    <div class="card invoice-preview-card shadow-none">
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
        <div class="card-body py-0">
            <div class="row p-sm-2 p-0">
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
                <div class="col-6 border-end">
                    <span class="fw-semibold ">GAJI</span>
                    <ul class="list-group list-group-timeline">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Gaji Pokok</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Jabatan</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Makan</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Bantuan Perumahan</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Transportasi</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan BPJS Tenaga Kerja</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan BPJS Kesehatan</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Gaji Pokok</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                    </ul>


                </div>
                <div class="col-6 ">
                    <span class="fw-semibold ">POTONGAN</span>
                    <ul class="list-group list-group-timeline">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Tenaga Kerja</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Kesehatan</span> <span class="numbers">279000</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-6 ">
                    <hr class="my-1">
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold ">JUMLAH GAJI</span>
                            <span class="me-3 fw-semibold numbers">279000</span>
                        </div>
                    </li>
                </div>
                <div class="col-6 ">
                    <hr class="my-1">
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold ">JUMLAH POTONGAN</span>
                            <span class="me-3 fw-semibol numbersd">279000</span>
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
    </div>
    <script>
        $(document).ready(function() {
            // var cnt = $('.bol').length - 1;
            // $('.bol').load('bolPrint.aspx', function() {
            //     if (cnt == 0) {
            // $('.ps').load('psPrint.aspx', function() {
            window.print();
            //         });
            //     }
            //     cnt--;
            // });
        });
    </script>
@endsection
