    <!-- Content -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            Data Berhasil diperbarui
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @elseif (session()->has('errors'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            Gagal memperbarui data
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">User Detail /</span> Detail
    </h4>

    {{-- @dd($user); --}}

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="/img/backgrounds/profile-banner.png" alt="Banner image" class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="/img/temp/user-temp.png" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $user->username }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-medium">
                                        <i class="bx bx-shield-quarter"></i> {{ $user->role_name ?: '-' }}
                                    </li>
                                    <li class="list-inline-item fw-medium">
                                        <i class="bx bx-group"></i> {{ $user->position ?: '-' }}
                                    </li>
                                    <li class="list-inline-item fw-medium">
                                        <i class="bx bxs-buildings"></i> {{ $user->satker ?: '-' }}
                                    </li>
                                </ul>
                            </div>
                            @can('UserManagement')
                                <div>
                                    <a href="/users/{{ $user->slug }}/update" class="btn btn-primary text-nowrap me-2">
                                        <i class="bx bx-edit me-1"></i>Edit
                                    </a>
                                    <button type="button" class="btn btn-primary text-nowrap ms-2" data-bs-toggle="modal"
                                        data-bs-target="#modalexperience">
                                        <i class="bx bx-plus-circle me-1"></i>Add Experience
                                    </button>
                                </div>
                            @endcan

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->
    <div class="modal fade" id="modalexperience" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalexperienceTitle">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store_experience_user') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" id="position" name="position"class="form-control"
                                    placeholder="Enter Position">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" id="location" name="location" class="form-control"
                                    placeholder="Enter Location">
                            </div>
                        </div>
                        <div class="row g-2">

                            <div class="col mb-0">
                                <label for="datestart" class="form-label">Date Start</label>
                                <input type="date" id="datestart" name="datestart"class="form-control">
                            </div>
                            <div class="col mb-0">
                                <label for="dateend" class="form-label">Date End</label>
                                <input type="date" id="dateend" name="dateend"class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input hidden type="text" name="uuid" value="{{ $user->employe_uuid }}">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Navbar pills -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                            class="bx bx-user me-1"></i> Profile</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="javascript:void(0);" alt="comming-soon"><i
                            class="bx bx-group me-1"></i> Teams</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);"alt="comming-soon"><i
                            class="bx bx-grid-alt me-1"></i> Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);"alt="comming-soon"><i
                            class="bx bx-link-alt me-1"></i> Connections</a></li> --}}
            </ul>
        </div>
    </div>
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user-check"></i><span
                                class="fw-bold  mx-2">Status Akun:</span>
                            <span
                                class="badge {{ $user->status == true ? 'bg-label-primary' : 'bg-label-warning' }}">{{ $user->status == true ? 'Active' : 'Inactive' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                                class="fw-bold  mx-2">Status Employe:</span>
                            <span
                                class="badge {{ $user->status_employe == true ? 'bg-label-primary' : 'bg-label-warning' }}">{{ $user->status_employe == true ? 'Active' : 'Retired' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                class="fw-bold mx-2">Full Name:</span> <span>{{ $user->name ?: '-' }}</span>
                        </li>

                        <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                class="fw-bold mx-2">Role:</span> <span>{{ $user->role_name ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span
                                class="fw-bold mx-2">NIP:</span> <span>{{ $user->nip ?: '-' }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span
                                class="fw-bold mx-2">NIK:</span> <span>{{ $user->nik ?: '-' }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-id-card"></i><span
                                class="fw-bold mx-2">NPWP:</span> <span>{{ $user->npwp ?: '-' }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bxs-id-card"></i><span
                                class="fw-bold mx-2">Position:</span>
                            <span>{{ $user->position ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-objects-vertical-bottom"></i><span
                                class="fw-bold mx-2">Golongan:</span>
                            <span>{{ $user->golongan ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-file"></i><span
                                class="fw-bold mx-2">Contract:</span>
                            <span>{{ $user->contract ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-building"></i><span
                                class="fw-bold mx-2">Work Location:</span>
                            <span>{{ $user->work_location ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-timer"></i><span
                                class="fw-bold mx-2">Start Work:</span>
                            <span>{{ $user->date_start ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-calendar-event"></i><span
                                class="fw-bold mx-2">Tenure:</span> <span>{{ $user->tenure ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-child"></i><span
                                class="fw-bold mx-2">Status Keluarga:</span>
                            <span>{{ $user->family_status }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-map-pin"></i><span
                                class="fw-bold mx-2">Address:</span> <span>{{ $user->address ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i
                                class="bx {{ $user->gender ? 'bx-male-sign' : 'bx-female-sign' }}"></i><span
                                class="fw-bold mx-2">Gender:</span> <span>{{ $user->gender ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="bx bx-droplet"></i>
                            <span class="fw-bold mx-2">Religion:</span>
                            <span>{{ $user->religion ?: '-' }}</span>
                        </li>


                    </ul>
                    <small class="text-muted text-uppercase">Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                                class="fw-bold mx-2">Contact:</span> <span>{{ $user->phone ?: '-' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <div class="row">
                                <span>
                                    <i class="col bx bx-envelope"></i>
                                    <span class="col fw-bold mx-2">Email:</span>
                                </span>
                                <span>{{ $user->email ?: '-' }}</span>
                            </div>

                        </li>
                    </ul>

                </div>
            </div>
            <!--/ About User -->

        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            <!-- Activity Timeline -->
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0"><i class="bx bx-list-ul me-2"></i>Work Experience</h5>
                </div>
                <div class="card-body">
                    <ul class="timeline ms-2">
                        @foreach ($user->experiences as $experience)
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-warning"></span></span>
                                <div class="d-flex justify-content-between">
                                    <div class="timeline-event col-md-10">
                                        <div class="timeline-header mb-1">
                                            <h6 class="mb-0">{{ $experience->position }}</h6>
                                            <small class="text-muted">{{ $experience->datestart }} <span
                                                    class="bx bx-minus"></span>
                                                {{ $experience->dateend }}</small>
                                        </div>
                                        <p class="mb-2">{{ $experience->location }}</p>

                                    </div>
                                    @can('UserManagement.view')
                                        <div class="col-md-1">
                                            <button type="button"
                                                class="btn btn-icon btn-label-primary rounded-pill dropdown-toggle hide-arrow m-auto"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="bx bx-dots-vertical-rounded"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-end " style="">
                                                <li>
                                                    <form action="{{ route('destroy_experience_user', $experience->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('post')
                                                        <button class="dropdown-item" type="submit">Hapus</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endcan

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--/ Activity Timeline -->
        </div>
    </div>
    <!--/ User Profile Content -->


    <div class="content-backdrop fade"></div>
