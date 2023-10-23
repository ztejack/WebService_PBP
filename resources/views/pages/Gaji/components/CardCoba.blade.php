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
                                25.800.000
                            </small>
                        </div>
                        <a class="btn btn-warning btn-sm" target="_blank" href="{{ route('page_detail_slip_gaji') }}"><i
                                class="bx bx-detail"></i></a>
                    </div>
                </li>
            @endfor
        </ul>
    </div>
    <div class="modal fade" id="addkehadiranModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Absen Kehadiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="absen" class="form-label">Absen</label>
                            <input type="number" id="absen" class="form-control form-control-sm" value="0"
                                placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label" for="perjalanan">Perjalanan</label>
                            <input type="number" class="form-control form-control-sm" id="perjalanan" value="0"
                                placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label class="form-label" for="perjalanan">Perjalanan</label>
                            <div class="input-append date" id="datepicker" data-date="02-2012"
                                data-date-format="mm-yyyy">
                                <input type="text" readonly="readonly" name="date">
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-md-0 mb-4">
                        <label for="bs-datepicker-autoclose" class="form-label">Auto Close</label>
                        <input type="text" id="bs-datepicker-autoclose" placeholder="MM/DD/YYYY"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
