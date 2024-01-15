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
                                <td>: {{ $employe->familystatus->familystatus }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr class="m-2">
        @if ($employe->contract->contract == 'DIREKSI' || $employe->contract->contract == 'KOMISARIS')
            @include('pages.Gaji.Slip.components.BodyPrintDireksi')
        @endif
        @if ($employe->contract->contract != 'DIREKSI' && $employe->contract->contract != 'KOMISARIS')
            @include('pages.Gaji.Slip.components.BodyPrintEmploye')
        @endif
    </div>
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
@endsection
