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
                                                <td>: {{ $employe->familystatus->familystatus }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr class="m-2">
                        @if ($employe->contract->contract == 'DIREKSI' || $employe->contract->contract == 'KOMISARIS')
                            @include('pages.Gaji.Slip.components.BodyDireksi')
                        @elseif($employe->contract->contract != 'DIREKSI' && $employe->contract->contract == 'KOMISARIS')
                            @include('pages.Gaji.Slip.components.BodyEmploye')
                        @endif


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
                                            <span class="bx bx-x-circle"></span>
                                            {{ $slip->status }}
                                        </span>
                                    @else
                                        @if ($slip->gajisubmit->aprv_4 == true)
                                            <span class="bx-flashing uppercase">
                                                <span class="bx bx-check-circle"></span>
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
                                                    @if ($slip->gajisubmit->aprv_3 == true)
                                                        @if ($slip->gajisubmit->aprv_4 == true)
                                                            Disetujui
                                                        @else
                                                            Menunggu Persetujuan Direktur Utama
                                                        @endif
                                                    @else
                                                        Menunggu Persetujuan General Manager
                                                    @endif
                                                @else
                                                    Menunggu persetujuan Asistem Manager
                                                @endif
                                            @else
                                                Menunggu persetujuan Supervisor
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
