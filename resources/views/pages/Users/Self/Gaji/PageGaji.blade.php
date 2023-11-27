@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- @include('pages.Gaji.components.DataGaji') --}}
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gaji /</span> {{ $employe->name }}
            </h4>
            @if (session()->has('succ'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('succ') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @elseif (session()->has('err'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session('err') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    {{-- Card Gaji Pokok & Jabatan --}}
                    @include('pages.Users.Self.Gaji.components.CardGajiPokok')


                    {{-- Card Tunjangan --}}
                    @include('pages.Users.Self.Gaji.components.CardTunjangan')
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
