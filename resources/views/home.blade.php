@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- @dd() --}}
            @include('components.global.comp1')
            @include('components.global.comp2')
        </div>

        <div class="container-xxl flex-grow-1 container-p-y">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <script>
            function formatNumberWithComma(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            const valuespan = document.querySelectorAll(".numberin");
            valuespan.forEach((span) => {
                const originalValue = span.innerHTML;
                const formattedValue = formatNumberWithComma(originalValue);
                span.innerHTML = formattedValue;
            });
        </script>
        {{-- footer --}}
        @include('components.global.footer')

        <div class="content-backdrop fade"></div>
    </div>
@endsection
