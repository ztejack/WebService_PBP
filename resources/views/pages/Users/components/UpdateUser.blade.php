<div class="row">
    <div class="col-md-12">

        @if (session()->has('succes'))
            <div class="alert alert-success alert-dismissible" role="alert">
                Data Berhasil diperbarui
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            {{-- @elseif (session()->has('error')) --}}
        @elseif ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                Gagal memperbarui data
                {{--  --}}
                {{-- {{-- @foreach ($errors->all() as $error) --}}
                {{ $errors }}
                {{-- @endforeach  --}}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @else
        @endif

        <div class="card mb-4">
            <h5 class="card-header">Update Data</h5>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                {{-- <form id="formAccountSettings" method="put" action="/users/update/{{ $user->slug }}" --}}
                <form id="formAccountSettings" method="put" action="{{ Route('update_user', $user->slug) }}"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Nama User" autofocus="" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" id="username" name="username"
                                placeholder="Nama User" autofocus="" value="{{ $user->username }}">
                            @if ($errors->has('username'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('username') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i> </span>
                                <input class="form-control" type="text" name="email" id="email"
                                    placeholder="mail@example.com" value="{{ $user->email }}">
                            </div>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phonenumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-phone"></i> </span>
                                <input type="text" id="phonenumber" name="phonenumber" class="form-control"
                                    placeholder="" value="{{ $user->phone }}">
                                @if ($errors->has('phonenumber'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phonenumber') }}
                                    </div>
                                @endif
                                {{-- @if ($errors->has('phone'))
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @endif --}}
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
                                    @foreach ($satkers as $satker)
                                        @if (old('satker', $user->satker) == $satker->satker)
                                            <option value="{{ $user->satker }}" selected>
                                                {{ $satker->satker }}
                                            </option>
                                        @else
                                            <option value="{{ $satker->satker }}">
                                                {{ $satker->satker }}
                                            </option>
                                        @endif
                                    @endforeach

                                </select>
                                @if ($errors->has('satker'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('satker') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="position" class="form-label">Position</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bxs-id-card"></i></span>
                                <select id="position" class="form-select">
                                    @if (old('position', $user->position))
                                        <option value="{{ $user->position }}">{{ $user->position }}</option>
                                    @else
                                        <option>Select One</option>
                                    @endif
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            @if ($errors->has('position'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('position') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="golongan" class="form-label">Golongan</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-objects-vertical-bottom"></i></span>
                                <select id="golongan" class="form-select">
                                    @if (old('golongan', $user->golongan))
                                        <option value="{{ $user->golongan }}">{{ $user->golongan }}</option>
                                    @else
                                        <option>Select One</option>
                                    @endif
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                    <option value="IX">IX</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                </select>
                            </div>
                            @if ($errors->has('golongan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('golongan') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="contract" class="form-label">Contract Type</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-file"></i></span>
                                <select id="contract" class="form-select">
                                    @if (old('contract', $user->contract_type))
                                        <option value="{{ $user->contract_type }}">
                                            {{ $user->contract_type ?? 'not Set' }}
                                        </option>
                                    @else
                                        <option>Select One</option>
                                    @endif
                                    <option value="Type_one">Type_one</option>
                                    <option value="Type-two">Type-two</option>
                                </select>
                            </div>
                            @if ($errors->has('contract'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contract') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="date_start" class="form-label">Date Start</label>
                            <input class="form-control" type="date" name="date_start" id="date_start"
                                value="{{ $user->date_start }}">
                            @if ($errors->has('date_start'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_start') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="tenure" class="form-label">Tenure</label>
                            <input class="form-control" type="text" name="tenure" id="tenure" readonly>
                            <input type="text" name="val_tenure" id="val_tenure" readonly hidden>
                            @error('tenure')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- Line --}}
                        <hr class="my-0 mb-2">
                        {{-- Line --}}
                        <div class="mb-3 col-md-6">
                            <label for="nip" class="form-label">NIP</label>
                            <input class="form-control" type="text" name="nip" id="nip"
                                placeholder="00000000-000000-0-000" value="{{ $user->nip }}">
                            @if ($errors->has('nip'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nip') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="npwp" class="form-label">NPWP</label>
                            <input class="form-control" type="text" name="npwp" id="npwp"
                                placeholder="00.000.000.0-000.0000" value="{{ $user->npwp }}">
                            @if ($errors->has('npwp'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('npwp') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="nik" class="form-label">Nik</label>
                            <input class="form-control" type="text" name="nik" id="nik"
                                placeholder="00.000.000.0-000.0000" value="">
                            @if ($errors->has('nik'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nik') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="tempat" class="form-label">Tempat Tanggal Lahir</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tempat" id="tempat">
                                <input class="form-control" type="date" value="{{ $user->ttl }}"
                                    name="tanggal" id="tanggal">
                            </div>

                            @if ($errors->has('tempat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tempat') }}
                                </div>
                            @endif
                            @if ($errors->has('tanggal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggal') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="address" id="address">
                            </div>

                            @if ($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="addressid" class="form-label">Address ID Card</label>
                            <input class="form-control" type="text" name="addressid" id="addressid">
                            @if ($errors->has('addressid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('addressid') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" class="form-select">
                                <option>Select One</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                            @if ($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="religion" class="form-label">Religion</label>

                            <select id="religion" class="form-select">
                                @if (old('religion', $user->religion))
                                    <option value="{{ $user->religion }}">{{ $user->religion }}</option>
                                @else
                                    <option>Select One</option>
                                @endif
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Other">Other</option>
                            </select>
                            @if ($errors->has('religion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('religion') }}
                                </div>
                            @endif
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
                {{-- @include('pages.users.components.modalResetPassword') --}}

            </div>
            <!-- /Account -->
        </div>
        <div class="card">
            <h5 class="card-header">Hapus Akun</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Apakah Anda Yakin Ingin Menghapus Akun Anda?
                        </h6>
                        <p class="mb-0">Saat akun sudah terhapus, maka semua data akan hilang. Tolong pastikan
                            kembali </p>
                    </div>
                </div>
                {{-- <form id="formAccountDeactivation" onsubmit="return false" action="{{ route('destroy') }}">
                    @method('delete')
                    @csrf
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                        <label class="form-check-label" for="accountActivation">Saya mengonfirmasi Penghapusan
                            akun saya</label>
                    </div>
                    <button type="submit" onclick="return confirm('Apa anda yakin?')"
                        class="btn btn-danger deactivate-account">Hapus Akun</button>
                </form> --}}
            </div>
        </div>
    </div>
</div>
