@extends('layouts.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper ">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card shadow-none bg-transparent border border-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Perhatian!!!</h5>
                    <p class="card-text">
                        Setiap perubahan parameter gaji diperlukan update ulang gaji karyawan untuk menghindari kesalahan
                        perhitungan
                        dalam pengajuan gaji.
                        <hr>
                        Update gaji dengan cara menekan tombol
                        <mark><strong class="text-primary"><span class="bx bx-save"></span>Save</strong></mark>
                        pada setiap gaji karyawan non <span class="fw-bold">Direksi & Komisaris</span>
                    </p>
                </div>
            </div>
            @include('pages.Gaji.GajiParam.components.DataTunjab')
            @include('pages.Gaji.GajiParam.components.DataTunjangan')
            @include('pages.Gaji.GajiParam.components.DataPTKP')
            @include('pages.Gaji.GajiParam.components.DataBPJS')
            @include('pages.Gaji.GajiParam.components.DataPPH')
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
