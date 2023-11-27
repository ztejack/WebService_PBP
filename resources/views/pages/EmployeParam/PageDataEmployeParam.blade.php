@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        Data Berhasil ditambahkan
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>

                    <script>
                        setTimeout(function() {
                            $('.alert').alert('close');
                        }, 5000);
                    </script>
                @elseif (session()->has('errors'))
                    <div class="alert alert-danger alert-dismissible" role="alert" aria-live="assertive" aria-atomic="true"
                        data-bs-delay="2000">
                        Gagal menambahkan data
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            $('.alert').alert('close');
                        }, 5000);
                    </script>
                @elseif (session()->has('err'))
                    <div class="alert alert-danger alert-dismissible" role="alert" aria-live="assertive"
                        aria-atomic="true" data-bs-delay="2000">
                        {{ session('err') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            $('.alert').alert('close');
                        }, 5000);
                    </script>
                @elseif (session()->has('succ'))
                    <div class="alert alert-success alert-dismissible" role="alert" aria-live="assertive"
                        aria-atomic="true" data-bs-delay="2000">
                        {{ session('succ') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            $('.alert').alert('close');
                        }, 5000);
                    </script>
                @endif
                <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Admin /</span> Satuan Kerja
                </h4>
                @can('SatkerManagement')
                    @include('pages.EmployeParam.components.CardSatker')
                @endcan
                @can('PositionManagement')
                    @include('pages.EmployeParam.components.CardPosition')
                @endcan
                @can('ContractManagement')
                    @include('pages.EmployeParam.components.CardContract')
                @endcan
                @can('GolonganManagement')
                    @include('pages.EmployeParam.components.CardGolongan')
                @endcan

            </div>
        </div>
        {{-- footer --}}
        @include('components.global.footer')

        <div class="content-backdrop fade"></div>
    </div>


    <!-- Content wrapper -->
@endsection
