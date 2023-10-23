@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include('pages.Gaji.GajiParam.components.DataTunjab')
            @include('pages.Gaji.GajiParam.components.DataTunjangan')
        </div>
        {{-- footer --}}
        @include('components.global.footer')

        <div class="content-backdrop fade"></div>
    </div>
    <script>
        // // Format currency in the table
        const currencyElements = document.querySelectorAll('.currency');
        currencyElements.forEach(function(element) {
            const value = parseFloat(element.textContent);
            element.textContent = value.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
        });
    </script>

    <!-- Content wrapper -->
@endsection
