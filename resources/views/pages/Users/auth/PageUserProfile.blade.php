@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @if (session()->has('succ'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('succ') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @include('pages.Users.auth.Components.ProfileUser')
        </div>
        {{-- footer --}}
        @include('components.global.footer')

        <div class="content-backdrop fade"></div>
    </div>


    <!-- Content wrapper -->
@endsection
