<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0 mb-4">
        <h5 class="mb-0">Kehadiran</h5>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addkehadiranModal">
            <i class="bx bx-plus"></i> Tambah Absen Kehadiran
        </button>
    </div>
    <div class="card-body pt-2" style="overflow-y: overlay;
    MAX-HEIGHT: 50VH;">
        <ul class="m-0 p-0 h-100">
            @for ($i = 1; $i <= 20; $i++)
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-user-x"></i></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-1 fw-normal">Priode <span class="text-warning fw-semibold">Juli
                                    2023</span></h6>
                            <small class="text-danger fw-normal d-block">
                                <i class="bx bx-minus "></i>
                                {{ $total_potongan_lainnya }}
                            </small>
                        </div>
                        <a class="btn btn-warning btn-sm" target="_blank" href="{{ route('page_detail_slip_gaji') }}"><i
                                class="bx bx-detail"></i></a>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
    @include('pages.Gaji.components.ModalAddAbsensi')

</div>
