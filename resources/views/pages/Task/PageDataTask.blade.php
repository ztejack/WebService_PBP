@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Task /</span> Pengajuan
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
            @include('pages.Task.TaskGaji.components.CardDataTaskSubmissionAproval')
            <div class="divider">
                <hr>
            </div>
            @include('pages.Task.TaskGaji.components.CardDataTaskSubmissionDoneAprv')



        </div>
        {{-- footer --}}
        @include('components.global.footer')

        {{-- <div class="content-backdrop fade"></div> --}}
    </div>

    <!-- Content wrapper -->
@endsection
