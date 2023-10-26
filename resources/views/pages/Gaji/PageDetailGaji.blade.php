@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- @include('pages.Gaji.components.DataGaji') --}}
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gaji /</span> {{ $user->name }}
            </h4>
            <div class="row">
                <div class="col-md-8">
                    {{-- Card Gaji Pokok & Jabatan --}}
                    @include('pages.Gaji.components.CardGajiPokok')
                    {{-- Card Tunjangan --}}
                    @include('pages.Gaji.components.CardTunjangan')
                    {{-- Card BPJS --}}
                    {{-- <div class="card">
                        <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
                            <h5 class="">Data Tunjangan</h5>
                            <small class="text-muted float-end">Tunjangan</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="input-gaji-pokok">
                                    Tunjangan Transport
                                </label>
                                <input type="number" class="form-control readonly" id="input-gaji-pokok"
                                    placeholder="Tunjangaan Transportasi..." readonly disabled>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-4">
                    @include('pages.Gaji.components.CardAbsensi')
                    @include('pages.Gaji.components.CardSlipGaji')
                </div>
            </div>

        </div>
        {{-- footer --}}
        @include('components.global.footer')

        {{-- <div class="content-backdrop fade"></div> --}}
    </div>

    <!-- Content wrapper -->
@endsection
