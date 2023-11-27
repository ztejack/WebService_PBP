@extends('layouts.blank')

@section('content')
    <div class="card invoice-preview-card shadow-none bg-white">
        <div class="overlay"
            style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform: scale(0.5);
            background: url('{{ asset('img/logo/LOGO-PAGE-2.png') }}') no-repeat center center fixed;
            background-size: contain;
            opacity: 0.1;
            z-index: 1;">
        </div>
        <div class="card-body pb-2">
            <div class="d-flex flex-row p-0 position-relative">
                <span class="app-brand-logo demo position-absolute"
                    style="
                        top: 50%;
                        left: 32%;
                        transform: translate(-50%, -50%);">
                    <img src="{{ asset('img/logo/LOGO-PAGE-2.png') }}" alt="">
                </span>
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
                                <td class="pe-3">Tanggal</td>
                                <td>: {{ $slip->date->format('d-m-Y') }}</td>
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
                                <td class="pe-3">Golongan</td>
                                <td>: {{ $employe->golongan->golongan }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Status Keluarga</td>
                                <td>: K / {{ $employe->status_keluarga }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr class="m-2">
        <div class="card-body py-2">
            <div class="row">
                <div class="col-7 border-end">
                    <span class="fw-semibold ">GAJI I</span>
                    <ul class="list-group list-group-timeline">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Gaji Pokok</span>
                                <span>
                                    <span class="numberin">{{ $slip->gapok }}</span>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Tunjangan Jabatan</span>
                                <span>
                                    <span class="numberin">{{ $slip->tnj_jabatan }}</span>
                                </span>
                            </div>
                        </li>
                        @if ($slip->tnj_ahli)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Tunjangan Ahli</span>
                                    <span>
                                        <span class="numberin">{{ $slip->tnj_ahli }}</span>
                                    </span>
                                </div>
                            </li>
                        @endif
                    </ul>
                    <hr class="my-1">
                    <li class="list-group-item list-group-timeline-primary py-0 my-0 mb-2">
                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold ">JUMLAH I</span>
                            <span class="me-3 fw-semibold">Rp
                                <span class="numberin">
                                    {{ array_sum([$slip->gapok, $slip->tnj_ahli, $slip->tnj_jabatan]) }}
                                </span>
                            </span>
                        </div>
                    </li>

                    <span class="fw-semibold ">GAJI II</span>
                    <ul class="list-group list-group-timeline ">
                        @if ($slip->tnj_perumahan)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Tunjangan Bantuan Perumahan</span> <span><span
                                            class="numberin">{{ $slip->tnj_perumahan }}</span></span>
                                </div>
                            </li>
                        @endif
                        @if ($slip->total_tnj_makan)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Tunjangan Makan</span> <span><span
                                            class="numberin">{{ $slip->total_tnj_makan }}</span></span>
                                </div>
                            </li>
                        @endif
                        @if ($slip->total_tnj_transport)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Tunjangan Transportasi</span> <span><span
                                            class="numberin">{{ $slip->total_tnj_transport }}</span></span>
                                </div>
                            </li>
                        @endif
                        @if ($slip->total_tnj_shift)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Tunjangan shift</span> <span><span
                                            class="numberin">{{ $slip->total_tnj_shift }}</span></span>
                                </div>
                            </li>
                        @endif

                        @if ($slip->tnj_lapangan)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Tunjangan Lapangan</span> <span><span
                                            class="numberin">{{ $slip->tnj_lapangan }}</span></span>
                                </div>
                            </li>
                        @endif
                        @if ($slip->lembur)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Uang Lembur</span> <span><span class="numberin">{{ $slip->lembur }}</span></span>
                                </div>
                            </li>
                        @endif
                        @if ($slip->tnj_bpjs_tk)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Tunjangan BPJS Tenaga Kerja</span> <span><span
                                            class="numberin">{{ $slip->tnj_bpjs_tk }}</span></span>
                                </div>
                            </li>
                        @endif
                        @if ($slip->tnj_bpjs_kes)
                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                <div class="d-flex justify-content-between">
                                    <span>Tunjangan BPJS Kesehatan</span> <span><span
                                            class="numberin">{{ $slip->tnj_bpjs_kes }}</span></span>
                                </div>
                            </li>
                        @endif
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


                <div class="col-5">
                    <span class="fw-semibold ">POTONGAN</span>
                    <ul class="list-group list-group-timeline">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Tenaga Kerja</span> <span><span
                                        class="numberin">{{ $slip->pot_bpjs_tk }}</span></span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Iuran BPJS Kesehatan</span> <span><span
                                        class="numberin">{{ $slip->pot_bpjs_kes }}</span></span>
                            </div>
                        </li>
                    </ul>
                    @if ($slip->pot_sakit || $slip->pot_kosong || $slip->pot_terlambat || $slip->pot_perjalanan)
                        <span class="fw-semibold ">LAIN-LAIN</span>
                        <ul class="list-group list-group-timeline">

                            @if ($slip->pot_sakit)
                                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                    <div class="d-flex justify-content-between">
                                        <span>Sakit</span> <span><span
                                                class="numberin">{{ $slip->pot_sakit }}</span></span>
                                    </div>
                                </li>
                            @endif
                            @if ($slip->pot_kosong)
                                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                    <div class="d-flex justify-content-between">
                                        <span>Absen</span> <span><span
                                                class="numberin">{{ $slip->pot_kosong }}</span></span>
                                    </div>
                                </li>
                            @endif
                            @if ($slip->pot_terlambat)
                                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                    <div class="d-flex justify-content-between">
                                        <span>Terlambat</span> <span><span
                                                class="numberin">{{ $slip->pot_terlambat }}</span></span>
                                    </div>
                                </li>
                            @endif
                            @if ($slip->pot_perjalanan)
                                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                    <div class="d-flex justify-content-between">
                                        <span>Dnias</span> <span><span
                                                class="numberin">{{ $slip->pot_perjalanan }}</span></span>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    @endif
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
        <div class="card-body pt-2">
            <div class="row">
                <div class="col-7">
                    <ul class="list-group list-group-timeline">
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>JUMLAH GAJI I</span>
                                <span>
                                    <span class="numberin">
                                        {{ array_sum([$slip->gapok, $slip->tnj_ahli, $slip->tnj_jabatan]) }}
                                    </span>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>JUMLAH GAJI II</span>
                                <span>
                                    <span class="numberin">
                                        {{ array_sum([$slip->tnj_bpjs_tk, $slip->tnj_bpjs_kes, $slip->total_tnj_transport, $slip->total_tnj_shift, $slip->tnj_perumahan, $slip->total_tnj_makan]) }}
                                    </span>
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>JUMLAH POTONGAN</span>
                                <span>
                                    <span class="numberin">
                                        {{ array_sum([$slip->pot_bpjs_kes, $slip->pot_bpjs_tk]) }}
                                    </span>
                                </span>
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
            window.print();
        });
    </script>
@endsection
