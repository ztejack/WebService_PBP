<div class="row">
    <div class="col-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang {{ auth()->user()->name }}🎉</h5>
                        <p class="mb-4">
                            You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.
                        </p>

                        {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('/img/illustrations/man-with-laptop-light.png') }}" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 order-1">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0 d-flex align-middle">
                                <span class="rounded m-auto">
                                    <span class="bg-label-info rounded p-2">
                                        <i class="bx bx-group"></i>
                                    </span>
                                </span>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="{{ route('page_employe') }}">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Karyawan Tetap</span>
                        <h3 class="card-title mb-2">{{ $employee_tetap_count }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0 d-flex align-middle">
                                <span class="rounded m-auto">
                                    <span class="bg-label-success rounded p-2">
                                        <i class="bx bx-group"></i>
                                    </span>
                                </span>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="{{ route('page_employe') }}">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Karyawan PKWT</span>
                        <h3 class="card-title mb-2">{{ $employee_pkwt_count }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0 d-flex align-middle">
                                <span class="rounded m-auto">
                                    <span class="bg-label-primary rounded p-2">
                                        <i class="bx bx-group"></i>
                                    </span>
                                </span>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="{{ route('page_employe') }}">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Direksi</span>
                        <h3 class="card-title mb-2">{{ $direksi_count }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0 d-flex align-middle">
                                <span class="rounded m-auto">
                                    <span class="bg-label-warning rounded p-2">
                                        <i class="bx bx-group"></i>
                                    </span>
                                </span>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="{{ route('page_employe') }}">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Komisaris</span>
                        <h3 class="card-title mb-2">{{ $komisaris_count }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
