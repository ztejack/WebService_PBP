<div class="row">
    <div class="col-md-12">
        @if (session()->has('succes'))
            <div class="alert alert-success alert-dismissible" role="alert">
                Data Berhasil diperbarui
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (session()->has('err'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                Gagal memperbarui data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @else
        @endif

        <div class="card mb-4">
            <h5 class="card-header">Profile Detail</h5>
            <!-- Account -->
            <hr class="my-0">
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="/account/update" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control" type="text" id="name" name="name"
                                placeholder="Nama User" autofocus="" value="{{ $user->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" id="username" name="username"
                                placeholder="Nama User" autofocus="" value="{{ $user->username }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" name="email" id="email"
                                placeholder="mail@example.com" value="{{ $user->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3 col-md-6">
                            <label for="perusahaan_id" class="form-label">Perusahaan</label>
                            <select class="form-select" id="perusahaan_id" name="perusahaan_id"
                                aria-label="Default select example">
                                @foreach ($perusahaans as $perusahaan)
                                    @if (old('perusahaan_id', $user->satker->perusahaan_id) == $perusahaan->id)
                                        <option value="{{ $user->satker->perusahaan_id }}" selected>
                                            {{ $perusahaan->nama_perusahaan }}
                                        </option>
                                    @else
                                        <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama_perusahaan }}
                                        </option>
                                    @endif
                                @endforeach

                            </select>
                            @error('perusahaan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phonenumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">ID (+62)</span>
                                <input type="text" id="phonenumber" name="phonenumber" class="form-control"
                                    placeholder="" value="{{ $user->phonenumber }}">
                                @error('phonenumber')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="mb-3 col-md-6">
                            <label for="satker" class="form-label">Satuan Kerja</label>
                            <select class="form-select" id="satker_id" name="satker_id"
                                aria-label="Default select example">
                                @foreach ($satkers->where('perusahaan_id', $user->satker->perusahaan->id) as $satker)
                                    @if (old('satker_id', $user->satker->satker) == $satker->id)
                                        <option value="{{ $user->satker->id }}" selected>
                                            {{ $satker->satker }}
                                        </option>
                                    @else
                                        <option value="{{ $satker->id }}">
                                            {{ $satker->satker }}
                                        </option>
                                    @endif
                                @endforeach

                            </select>
                            @error('satker_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <a id="btnPW" type="button" data-bs-toggle="modal" data-bs-target="#modalPassword"
                                class="btn btn-outline-secondary w-100">Ubah Password</a>
                        </div>


                    </div>
                    <div class="mt-2">
                        <button id="btnSM" type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                        {{-- <button type="reset" class="btn btn-outline-secondary">Batal</button> --}}
                    </div>
                </form>
                {{-- @include('components.modalResetPassword') --}}

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
