@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- @include('pages.Gaji.components.DataGaji') --}}
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Gaji /</span> {{ $user->name }}
            </h4>
            @if (session()->has('succ'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('succ') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                <script>
                    setTimeout(function() {
                        $('.alert').alert('close');
                    }, 5000);
                </script>
            @elseif (session()->has('err'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session('err') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                <script>
                    setTimeout(function() {
                        $('.alert').alert('close');
                    }, 5000);
                </script>
            @endif
            <div class="row">
                <div class="col-md-8">
                    {{-- Card Gaji Pokok & Jabatan --}}
                    @if ($gaji->employee->contract->contract == 'DIREKSI')
                        @include('pages.Gaji.components.CardGajiDireksi')
                        @include('pages.Gaji.components.CardRekapDR')
                    @elseif($gaji->employee->contract->contract == 'KOMISARIS')
                        @include('pages.Gaji.components.CardGajiKomisaris')
                        @include('pages.Gaji.components.CardRekapKM')
                    @elseif($gaji->employee->contract->contract != 'DIREKSI')
                        @include('pages.Gaji.components.CardGajiPokok')
                    @endif


                    @if ($gaji->employee->contract->contract != 'DIREKSI' && $gaji->employee->contract->contract != 'KOMISARIS')
                        @include('pages.Gaji.components.CardTunjangan')
                    @endif
                    {{-- Card Tunjangan --}}

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
                    @if (!($gaji->employee->contract->contract == 'DIREKSI' || $gaji->employee->contract->contract == 'KOMISARIS'))
                        @include('pages.Gaji.components.CardAbsensi')
                        @include('pages.Gaji.components.CardLembur')
                    @endif
                    @include('pages.Gaji.components.CardRapel')
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
