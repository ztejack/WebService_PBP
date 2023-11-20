<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0 mb-4">
        <h5 class="mb-0">Kehadiran</h5>
        @if (!Request::is('gaji/self*'))
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#addkehadiranModal">
                <i class="bx bx-plus"></i> Tambah Absen Kehadiran
            </button>
        @endif

    </div>
    <div class="card-body pt-2" style="overflow-y: overlay;
    MAX-HEIGHT: 60VH;">
        <ul class="m-0 p-0 h-100">
            {{-- @for ($i = 1; $i <= 20; $i++) --}}
            @foreach ($data_absensi as $item)
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-user-x"></i></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-1 fw-normal">Priode
                                <span class="text-warning fw-semibold">
                                    {{ $item->date->format('M Y') }}
                                </span>
                            </h6>
                            <small class="text-danger fw-normal d-block">
                                <i class="bx bx-minus "></i>Rp
                                <span class="numbers">
                                    {{ $item->total_sum }}
                                </span>
                            </small>
                        </div>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#ModalAbsensi{{ $item->id }}"><i class="bx bx-detail"></i></button>
                        @include('pages.Gaji.components.ModalDetailAbsensi')
                    </div>
                </li>
            @endforeach
            {{-- @endfor --}}
        </ul>
    </div>
    @if (!Request::is('gaji/self*'))
        @include('pages.Gaji.components.ModalAddAbsensi')
    @endif

</div>
