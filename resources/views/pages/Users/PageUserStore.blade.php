@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                {{-- @endif --}}

                {{-- @if (session()->has('succes'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    Data Berhasil diperbarui
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div> --}}
            @elseif (session()->has('err'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Gagal menambah data {{ $errors }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @else
            @endif
            @include('pages.Users.components.StoreUser')
        </div>
        {{-- footer --}}
        @include('components.global.footer')

        <div class="content-backdrop fade"></div>
    </div>


    <!-- Content wrapper -->
@endsection
