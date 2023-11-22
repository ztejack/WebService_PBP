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
                                                <td class="pe-3">Tanggal</td>
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
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-lg-6 border-end">
                                    <span class="fw-semibold ">GAJI I</span>
                                    <ul class="list-group list-group-timeline">
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Gaji Pokok</span> <span><span
                                                        class="numberin">{{ $slip->gapok }}</span></span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>Tunjangan Jabatan</span> <span><span
                                                        class="numberin">{{ $slip->tnj_jabatan }}</span></span>
                                            </div>
                                        </li>
                                        @if ($slip->tnj_ahli)
                                            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                                <div class="d-flex justify-content-between">
                                                    <span>Tunjangan Ahli</span> <span><span
                                                            class="numberin">{{ $slip->tnj_ahli }}</span></span>
                                                </div>
                                            </li>
                                        @endif
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
                                                    <span>Uang Lembur</span> <span><span
                                                            class="numberin">{{ $slip->lembur }}</span></span>
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
                                            <span class="me-3 fw-semibold"><span>
                                                    Rp <span class="numberin">
                                                        {{ array_sum([$slip->tnj_bpjs_tk, $slip->tnj_bpjs_kes, $slip->total_tnj_transport, $slip->total_tnj_shift, $slip->tnj_perumahan, $slip->total_tnj_makan]) }}</span>
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                </div>

                                <div class="col-lg-6 ">
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
                                                        <span>Dinas</span> <span><span
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-timeline">
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>JUMLAH GAJI I</span> <span> <span
                                                        class="numberin">{{ array_sum([$slip->gapok, $slip->tnj_ahli, $slip->tnj_jabatan]) }}</span></span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>JUMLAH GAJI II</span> <span> <span
                                                        class="numberin">{{ array_sum([$slip->tnj_bpjs_tk, $slip->tnj_bpjs_kes, $slip->total_tnj_transport, $slip->total_tnj_shift, $slip->tnj_perumahan, $slip->total_tnj_makan]) }}</span></span>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                                            <div class="d-flex justify-content-between">
                                                <span>JUMLAH POTONGAN</span> <span> <span
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
                </div>
                <!-- /Invoice -->

                <!-- Invoice Actions -->
                <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-label-secondary w-100 mb-3 {{ $slip->gajisubmit->aprv_2 == true ? '' : 'disabled' }}"
                                target="_blank" href="{{ route('page_print_slip_gaji', $slip->id) }}"
                                {{ $slip->gajisubmit->aprv_2 == true ? 'enable' : 'disabled' }}>
                                <i class="bx bx-printer"></i>Print
                            </a>
                            <div
                                class="card {{ $slip->gajisubmit->aprv_2 == true ? 'bg-label-success' : 'bg-label-warning' }} mb-3">
                                <span class="fw-bold card-header pb-0">Status</span>
                                {{-- <i class='bx bx-calendar-x bx-flashing bx-flip-horizontal' ></i> --}}
                                <div class="card-body pt-0">
                                    @if ($slip->status == 'rejected')
                                        <span class="bx-flashing uppercase">
                                            <span class="bx bx-check-double"></span>
                                            {{ $slip->status }}
                                        </span>
                                    @else
                                        @if ($slip->gajisubmit->aprv_2 == true)
                                            <span class="bx-flashing uppercase">
                                                <span class="bx bx-check-double"></span>
                                                {{ $slip->status }}
                                            </span>
                                        @else
                                            <span class="bx-flashing uppercase ">
                                                <span class="spinner-border spinner-border-sm me-1" role="status"
                                                    aria-hidden="true"></span>
                                                {{ $slip->status }}...
                                            </span>
                                        @endif
                                    @endif
                                    <hr
                                        class=" {{ $slip->gajisubmit->aprv_2 == true ? 'text-success' : 'text-warning' }} my-1">
                                    <p class="card-text">
                                        @if ($slip->status == 'rejected')
                                            Pengajuan Gaji Ditolak
                                        @else
                                            @if ($slip->gajisubmit->aprv_1 == true)
                                                @if ($slip->gajisubmit->aprv_2 == true)
                                                    Telah Disetujui
                                                @else
                                                    Menunggu persetujuan Manager
                                                @endif
                                            @else
                                                Menunggu persetujuan Admin
                                            @endif
                                        @endif

                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /Invoice Actions -->

            </div>
        </div>
    </div>
@endsection
