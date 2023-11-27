@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include('pages.Gaji.components.DataGaji')
            <div class="divider">
                <div class="divider-text">
                    <i class="bx bx-spreadsheet"></i>
                </div>
            </div>
            @can('GajiManagement')
                @include('pages.Gaji.Submission.components.DataSubmission')
            @endcan
        </div>
        {{-- footer --}}
        @include('components.global.footer')

        <div class="content-backdrop fade"></div>
    </div>

    <!-- Content wrapper -->
@endsection
