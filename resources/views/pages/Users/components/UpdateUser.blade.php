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
<div class="nav-align-top">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link fw-semibold active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-data" aria-controls="navs-pills-top-data">User
                Update</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link fw-semibold " role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-role" aria-controls="navs-pills-top-role" aria-selected="true">Role &
                Permision</button>
        </li>
    </ul>

    <div class="tab-content">
        {{-- TAB USER DATA --}}
        <div class="col-md-12 tab-pane fade active show" id="navs-pills-top-data" role="tabpanel">


            <div class=" mb-4">
                <h5 class="card-header">Update Data</h5>
                <!-- Account -->
                <hr class="my-2">
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ Route('update_user', $user->slug) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <input type="text" name="slug" value="{{ old('name', $user->slug) }}" class="d-none">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama</label>
                                <input class="form-control" type="text" id="name" name="name"
                                    placeholder="Nama User" autofocus="" value="{{ old('name', $user->name) }}"
                                    required>
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->first('name') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control" type="text" id="username" name="username"
                                    placeholder="Username" autofocus="" value="{{ old('username', $user->username) }}"
                                    required>
                                @error('username')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i> </span>
                                    <input class="form-control" type="text" name="email" id="email"
                                        placeholder="mail@example.com" value="{{ old('email', $user->email) }}"
                                        required>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phonenumber">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-phone"></i> </span>
                                    <input type="text" id="phonenumber" name="phonenumber" class="form-control"
                                        placeholder="" value="{{ old('phonenumber', $user->phone) }}">
                                    @error('phonenumber')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Line --}}
                            <hr class="my-0 mb-2">
                            {{-- Line --}}

                            <div class="mb-3 col-md-6">
                                <label for="satker" class="form-label">Satuan Kerja</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxs-buildings"></i></span>
                                    <select class="form-select" id="satker" name="satker"
                                        aria-label="Default select example">
                                        @if (old('satker', $user->satker))
                                            <option value="{{ $user->satker }}" selected>
                                                {{ $user->satker }}
                                            </option>
                                        @else
                                            <option value="" selected>
                                                Select One
                                            </option>
                                        @endif
                                        @foreach ($satkers as $satker)
                                            @if (old('satker', $user->satker) != $satker->satker)
                                                <option value="{{ $satker->satker }}">
                                                    {{ $satker->satker }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('satker')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="position" class="form-label">Position</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxs-id-card"></i></span>
                                    <select id="position" name='position' class="form-select">
                                        @if (old('position', $user->position))
                                            <option value="{{ $user->position }}" selected>
                                                {{ $user->position }}
                                            </option>
                                        @else
                                            <option value="" selected>
                                                Select One
                                            </option>
                                        @endif
                                        @foreach ($positions as $position)
                                            @if (old('satker', $user->position) != $position->position)
                                                <option value="{{ $position->position }}">
                                                    {{ $position->position }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @error('position')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="golongan" class="form-label">Golongan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i
                                            class="bx bx-objects-vertical-bottom"></i></span>
                                    <select id="golongan" name='golongan' class="form-select">
                                        @if (old('golongan', $user->golongan))
                                            <option value="{{ $user->golongan }}" selected>
                                                {{ $user->golongan }}
                                            </option>
                                        @else
                                            <option value="" selected>
                                                Select One
                                            </option>
                                        @endif
                                        @foreach ($optiongolongans as $option)
                                            @if (old('golongan', $user->golongan) != $option->golongan)
                                                <option value="{{ $option->golongan }}">
                                                    {{ $option->golongan }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                @error('golongan')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="contract" class="form-label">Contract Type</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-file"></i></span>
                                    <select id="contract" name='contract' class="form-select">
                                        @if (!old('contract', $user->contract))
                                            <option value="" selected>
                                                Select One
                                            </option>
                                        @endif
                                        @foreach ($contracts as $contract)
                                            @if (old('contract', $user->contract) == $contract->contract)
                                                <option value="{{ $contract->contract }} "selected>
                                                    {{ $contract->contract }}
                                                </option>
                                            @else
                                                <option value="{{ $contract->contract }}">
                                                    {{ $contract->contract }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                @error('contract')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="date_start" class="form-label">Date Start</label>
                                <input class="form-control" type="date" name="date_start" id="date_start"
                                    value="{{ old('date_start', date('Y-m-d', strtotime($user->date_start))) }}">
                                @error('date_start')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tenure" class="form-label">Tenure</label>
                                <input class="form-control" type="text" name="tenure" id="tenure"
                                    value='{{ old('tenure', $user->tenure) }}' readonly>
                                <input type="text" name="val_tenure" id="val_tenure" readonly hidden>
                                @error('tenure')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="work_location" class="form-label">Work Location</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-building"></i></span>
                                    <select id="work_location" name='work_location' class="form-select">
                                        @if (!old('work_location', $user->work_location))
                                            <option value="" selected>
                                                Select One
                                            </option>
                                        @endif
                                        @foreach ($work_locations as $work_location)
                                            @if (old('work_location', $user->work_location) == $work_location->location)
                                                <option value="{{ $work_location->location }} "selected>
                                                    {{ $work_location->location }}
                                                </option>
                                            @else
                                                <option value="{{ $work_location->location }}">
                                                    {{ $work_location->location }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                @error('work_location')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status_employe" class="form-label">Status Employe</label>
                                <div class="w-100 m-auto">
                                    <div class="form-check form-check-inline">
                                        <input name="status_employe"
                                            class="form-check-input @error('status_employe') is-invalid @enderror"
                                            type="radio" value="1"
                                            data-custom-attr="{{ $user->status_employe }} "
                                            id="status_employe-active" required
                                            {{ $user->status_employe ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_employe-active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline form-check-danger">
                                        <input name="status_employe"
                                            class="form-check-input @error('status_employe') is-invalid @enderror"
                                            type="radio" value="0"
                                            data-custom-attr=" {{ $user->status_employe }} "
                                            id="status_employe-retired" required
                                            {{ !$user->status_employe ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_employe-retired">Retired
                                        </label>
                                    </div>
                                </div>

                                @error('status_employe')
                                    <div class="invalid-feedback"> $message </div>
                                @enderror
                            </div>
                            {{-- Line --}}
                            <hr class="my-0 mb-2">
                            {{-- Line --}}
                            <div class="mb-3 col-md-6">
                                <label for="nip" class="form-label">NIP</label>
                                <input class="form-control" type="text" name="nip" id="nip"
                                    placeholder="xxxxxxxx-xxxxxx-x-xxx" value="{{ old('nip', $user->nip) }}">
                                @error('nip')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="npwp" class="form-label">NPWP</label>
                                <input class="form-control" type="text" name="npwp" id="npwp"
                                    placeholder="00.000.000.0-000.0000" value="{{ old('npwp', $user->npwp) }}">
                                @error('npwp')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nik" class="form-label">Nik</label>
                                <input class="form-control" type="text" name="nik" id="nik"
                                    placeholder="00.000.000.0-000.0000" value="{{ old('nik', $user->nik) }}">
                                @error('nik')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tempat" class="form-label">Tempat Tanggal Lahir</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="tempat" id="tempat"
                                        value="{{ old('tempat', $user->tempat) }}">
                                    <input class="form-control" type="date"
                                        value="{{ old('tanggal', $user->tanggal) }}" name="tanggal" id="tanggal">
                                </div>

                                @error('tempat')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('tanggal')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="address" id="address"
                                        value="{{ old('address', $user->address) }}">
                                </div>

                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="addressid" class="form-label">Address ID Card</label>
                                <input class="form-control" type="text" name="addressid" id="addressid"
                                    value="{{ old('addressid', $user->ktp_address) }}">
                                @error('addressid')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name='gender' class="form-select">
                                    @if (old('gender', $user->gender) == 'Male')
                                        <option value="{{ $user->gender }}">Male</option>
                                        <option value="0">Female</option>
                                    @else
                                        <option value="{{ $user->gender }}">Female</option>
                                        <option value="1">Male</option>
                                    @endif
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="religion" class="form-label">Religion</label>

                                <select id="religion" name='religion' class="form-select">
                                    @if (old('religion', $user->religion))
                                        <option value="{{ $user->religion }}"selected>{{ $user->religion }}</option>
                                    @else
                                        <option value="" selected>Select One</option>
                                    @endif
                                    @foreach ($optionreligions as $option)
                                        @if (old('religion', $user->religion) != $option->val)
                                            <option value="{{ $option->val }}">{{ $option->val }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('religion')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="family_status" class="form-label">Family Status
                                    {{ $user->family_status }}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-child"></i></span>
                                    <select id="family_status" name='family_status' class="form-select">
                                        @if (!old('family_status', $user->family_status))
                                            <option value="" selected>
                                                Select One
                                            </option>
                                        @endif
                                        @foreach ($family_statuses as $family_status)
                                            @if (old('family_status', $user->family_status) == $family_status->familystatus)
                                                <option value="{{ $family_status->familystatus }} "selected>
                                                    {{ $family_status->familystatus }}
                                                </option>
                                            @else
                                                <option value="{{ $family_status->familystatus }}">
                                                    {{ $family_status->familystatus }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                @error('family_status')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Line --}}
                            <hr class="my-0 mb-2">
                            {{-- Line --}}

                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <a id="resetPasswordButton" type="button" class="btn btn-outline-secondary w-100"
                                    data-php-value="{{ $user->slug }}">Reset
                                    Password</a>
                            </div>
                            <div class="mb-3 col-md-12" id="alertarea">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button id="btnSM" type="submit" class="btn btn-primary me-2">Simpan
                                Perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="">
                <h5 class="card-header mb-2">Nonaktifkan Akun</h5>
                <div class="card-body">
                    @if ($user->status == true)
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Apakah Anda Yakin Ingin Menonaktifkan Akun?
                                </h6>
                                <p class="mb-0">Saat akun sudah tidak aktif, maka akun tidak dapat di akses atau
                                    digunakan.
                                    Tolong pastikan
                                    kembali </p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" method="POST" action="{{ route('activate_user') }}">
                            @method('post')
                            @csrf
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountArchive"
                                    id="accountArchive" required>
                                <input class="d-none" name="slug" hide value="{{ $user->slug }}">
                                <label class="form-check-label" for="accountArchive">Saya mengonfirmasi penonaktifan
                                    akun </label>
                            </div>
                            <button id="btnarchive" type="submit" onclick="return confirm('Apa anda yakin?')"
                                class="btn btn-danger deactivate-account">Nonaktifkan</button>
                        </form>
                    @else
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-info">
                                <h6 class="alert-heading fw-bold mb-1">Apakah Anda Yakin Ingin Mengaktifkan Akun?
                                </h6>
                                <p class="mb-0">Saat akun sudah aktif, maka akun dapat di akses atau
                                    digunakan.
                                    Tolong pastikan
                                    kembali </p>
                            </div>
                        </div>
                        <form id="formAccountActivation" method="POST" action="{{ route('activate_user') }}">
                            @method('post')
                            @csrf
                            <input class="d-none" name="slug" hide value="{{ $user->slug }}">
                            <button id="btnarchive" type="submit" onclick="return confirm('Apa anda yakin?')"
                                class="btn btn-info deactivate-account">Aktifkan</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-12 tab-pane fade" id="navs-pills-top-role" role="tabpanel">
            <div class="mb-4">
                <h5 class="card-header">Role User</h5>
                <!-- Role -->
                <hr class="my-2">
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ Route('attemp_role') }}"
                        enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">Role</label>

                                <div class="input-group input-group-merge mb-2">
                                    <span class="input-group-text"><i class="bx bx-shield-quarter"></i> </span>
                                    <select class="form-select" type="text" name="role" id="role"
                                        placeholder="Celect Role" value="{{ old('role', $user->role_name) }}">
                                        {{-- @if (old('role', $user->role_name))
                                            <option value="{{ $user->role_name }}" selected>{{ $user->role_name }}
                                            </option>
                                        @else --}}
                                        @foreach ($roles as $role)
                                            @if (old('role', $user->role_name) == $role->name)
                                                <option value="{{ $role->name }}" selected>
                                                    {{ $role->name }}
                                                </option>
                                            @else
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                        {{-- @endif --}}
                                    </select>
                                    <input type="text" name="slug" hidden value="{{ $user->slug }}">

                                </div>
                                <button class="btn btn-outline-primary" type="submit">
                                    Submit
                                </button>
                                @error('role')
                                    <div class="invalid-feedback d-block">
                                        {{ $errors->first('role') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="my-2">
                <h5 class="card-header">Permision User</h5>
                <!-- Permision -->
                <hr class="my-2">
                <div class="card-body">
                    <ul class="list-group">

                        @foreach ($userPermisions as $permission)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $permission }}
                                <span class="bx bx-check-circle"></span>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
