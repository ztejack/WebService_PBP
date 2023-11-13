@extends('layouts.blank')

@section('content')
    <div class="card invoice-preview-card shadow-none">
        <div class="card-body">
            <div class="d-flex flex-xl-row flex-md-column flex-sm-row flex-column  p-0">
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
            </div>
        </div>
        <hr class="m-2">
        <div class="card-body py-1">
            <div class="row p-0">
                <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                    <table>
                        <tbody>
                            <tr>
                                <td class="pe-3">Periode</td>
                                <td>: {{ $slip->date }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Karyawan</td>
                                <td>: {{ $employe->getUserNameAttribute() }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Jabatan</td>
                                <td>: {{ $employe->position->position }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Status</td>
                                <td>: {{ $employe->status? "Aktif":'' }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Golongan</td>
                                <td>: {{ $employe->golongan->golongan }}</td>
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
                    <span class="fw-semibold ">GAJI I</span>
                    <ul class="list-group list-group-timeline">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Gaji Pokok</span> <span>Rp <span class="numberin">{{ $slip->gapok }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Ahli</span> <span>Rp <span
                                        class="numberin">{{ $slip->tnj_ahli }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Jabatan</span> <span>Rp <span
                                        class="numberin">{{ $slip->tnj_jabatan }}</span></span>
                            </div>
                        </li>

                    </ul>
                    <hr class="my-1">
                    <li class="list-group-item list-group-timeline-primary py-0 my-0 mb-2">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold ">JUMLAH I</span>
                            <span class="me-3 fw-semibold">Rp
                                <span
                                    class="numberin">{{ array_sum([$slip->gapok, $slip->tnj_ahli, $slip->tnj_jabatan]) }}</span></span>
                        </div>
                    </li>

                    <span class="fw-semibold ">GAJI II</span>
                    <ul class="list-group list-group-timeline ">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Makan</span> <span>Rp <span
                                        class="numberin">{{ $slip->total_tnj_makan }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Bantuan Perumahan</span> <span>Rp <span
                                        class="numberin">{{ $slip->tnj_perumahan }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan shift</span> <span>Rp <span
                                        class="numberin">{{ $slip->total_tnj_shift }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Transportasi</span> <span>Rp <span
                                        class="numberin">{{ $slip->total_tnj_transport }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan BPJS Tenaga Kerja</span> <span>Rp <span
                                        class="numberin">{{ $slip->tnj_bpjs_tk }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan BPJS Kesehatan</span> <span>Rp <span
                                        class="numberin">{{ $slip->tnj_bpjs_kes }}</span></span>
                            </div>
                        </li>
                    </ul>
                    <hr class="my-1">
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold ">JUMLAH II</span>
                            <span class="me-3 fw-semibold"><span>Rp <span
                                        class="numberin">{{ array_sum([$slip->tnj_bpjs_tk, $slip->tnj_bpjs_kes, $slip->total_tnj_transport, $slip->total_tnj_shift, $slip->tnj_perumahan, $slip->total_tnj_makan]) }}</span></span></span>
                        </div>
                    </li>
                </div>


                <div class="col-6 ">
                    <span class="fw-semibold ">POTONGAN</span>
                    <ul class="list-group list-group-timeline">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Tenaga Kerja</span> <span>Rp <span
                                        class="numberin">{{ $slip->pot_bpjs_tk }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Kesehatan</span> <span>Rp <span
                                        class="numberin">{{ $slip->pot_bpjs_kes }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Sakit</span> <span>Rp <span
                                        class="numberin">{{ $slip->pot_sakit }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Kosong</span> <span>Rp <span
                                        class="numberin">{{ $slip->pot_kosong }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Terlambat</span> <span>Rp <span
                                        class="numberin">{{ $slip->pot_terlambat }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Perjalanan</span> <span>Rp <span
                                        class="numberin">{{ $slip->pot_perjalanan }}</span></span>
                            </div>
                        </li>
                    </ul>
                    <hr class="my-1">
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold ">JUMLAH POTONGAN</span>
                            <span class="me-3 fw-semibold">Rp <span
                                    class="numberin">{{ array_sum([$slip->pot_bpjs_kes, $slip->pot_bpjs_tk]) }}</span></span>
                        </div>
                    </li>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <ul class="list-group list-group-timeline">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>JUMLAH GAJI I</span> <span>Rp <span
                                        class="numberin">{{ array_sum([$slip->gapok, $slip->tnj_ahli, $slip->tnj_jabatan]) }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>JUMLAH GAJI II</span> <span>Rp <span
                                        class="numberin">{{ array_sum([$slip->tnj_bpjs_tk, $slip->tnj_bpjs_kes, $slip->total_tnj_transport, $slip->total_tnj_shift, $slip->tnj_perumahan, $slip->total_tnj_makan]) }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>JUMLAH POTONGAN</span> <span>Rp <span
                                        class="numberin">{{ array_sum([$slip->pot_bpjs_kes, $slip->pot_bpjs_tk]) }}</span></span>
                            </div>
                        </li>
                    </ul>
                    <hr class="my-2">
                    <span class=" py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold ">TOTAL DITERIMA KARYAWAN</span>
                            <span id="ttlterima" class="d-none hidden" hidden>{{ $slip->total }}</span>
                            <span class="me-3 fw-semibold numbers">Rp <span
                                    class="numberin">{{ $slip->total }}</span></span>
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
