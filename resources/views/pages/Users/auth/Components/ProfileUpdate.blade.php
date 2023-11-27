@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        Data Berhasil diperbarui
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session()->has('errors'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        Gagal memperbarui data
        {{ session('errors') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
<div class="card">
    {{-- TAB USER DATA --}}
    <div class="col-md-12 tab-pane fade active show" id="navs-pills-top-data" role="tabpanel">


        <div class=" mb-4">
            <h5 class="card-header">Update Profile</h5>
            <!-- Account -->
            <hr class="my-2">
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ Route('update_profile') }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <input type="text" name="slug" value="{{ old('name', $user->slug) }}" class="d-none">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control" type="text" id="name" placeholder="Nama User"
                                autofocus="" value="{{ old('name', $user->name) }}" disabled>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" id="username" placeholder="Username"
                                autofocus="" value="{{ old('username', $user->username) }}" required disabled>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i> </span>
                                <input class="form-control" type="text" name="email" id="email"
                                    placeholder="mail@example.com" value="{{ old('email', $user->email) }}" required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phone">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-phone"></i> </span>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder=""
                                    value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-0 mb-2">

                        {{-- Line --}}
                        {{-- <hr class="my-0 mb-2">
                        Line

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
                                <span class="input-group-text"><i class="bx bx-objects-vertical-bottom"></i></span>
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
                                    @if ($optiongolongans != null)
                                        @foreach ($optiongolongans as $option)
                                            @if (old('satker', $user->golongan) != $option->val)
                                                <option value="{{ $option->val }}">
                                                    {{ $option->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif


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
                                    @if (old('contract', $user->contract) == 'Type-two')
                                        <option value="{{ $user->contract }}" selected>Type-two</option>
                                        <option value="Type_one">Type-one</option>
                                    @else
                                        <option value="" selected>
                                            Select One
                                        </option>
                                    @endif
                                    @foreach ($contracts as $contract)
                                        @if (old('contract', $user->contract) != $contract->contract)
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
                        {{-- Line --}}

                        {{-- Line --}}
                        {{-- <div class="mb-3 col-md-6">
                            <label for="nip" class="form-label">NIP</label>
                            <input class="form-control" type="text" name="nip" id="nip"
                                placeholder="00000000-000000-0-000" value="{{ old('nip', $user->nip) }}">
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
                        </div> --}}
                        {{-- <div class="mb-3 col-md-6">
                            <label for="religion" class="form-label">Religion</label>

                            <select id="religion" name='religion' class="form-select">
                                @if (old('religion', $user->religion))
                                    <option value="{{ $user->religion }}"selected>{{ $user->religion }}</option>
                                @else
                                    <option value="" selected>Select One</option>
                                @endif --}}
                        {{--
                                @if ($optionreligions != null) --}}
                        {{-- @foreach ($optionreligions as $option)
                                        @if (old('religion', $user->religion) != $option->val)
                                            <option value="{{ $option->val }}">{{ $option->val }}</option>
                                        @endif
                                    @endforeach --}}
                        {{-- @endif --}}

                        {{-- </select>
                            @error('religion')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>  --}}

                        {{-- Line --}}
                        {{-- <hr class="my-0 mb-2"> --}}
                        {{-- Line --}}

                        <div class="mb-3 col-md-3">
                            <label for="ChangePasswordButton" class="form-label">Password</label>
                            <button id="ChangePasswordButton" type="button" class="btn btn-outline-secondary w-100"
                                data-bs-toggle="modal" data-bs-target="#modalCenter"
                                data-php-value="{{ $user->slug }}">Ubah
                                Password</button>
                        </div>

                    </div>
                    <div class="mt-2">
                        <button id="btnSM" type="submit" class="btn btn-primary me-2">Simpan
                            Perubahan</button>
                        <button type="reset" class="btn btn-outline-secondary">Batal</button>
                    </div>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('change_password') }}" method="POST">
                                @csrf
                                @method('post')
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="currentWithTitle" class="form-label">Current
                                                Password</label>
                                            <input type="password" id="currentWithTitle" name="currentpw"
                                                class="form-control passwordInput"
                                                placeholder="Enter Current Password">
                                            @error('currentpw')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="newWithTitle" class="form-label">New Password</label>
                                            <input type="password" id="newWithTitle" name="newpw"
                                                class="form-control passwordInput @error('newpw') 'is-invalid' @enderror"
                                                placeholder="Enter new">
                                            @error('newpw')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label for="confirmWithTitle" class="form-label">Confirm
                                                Password</label>
                                            <input type="password" id="confirmWithTitle" name="confirmpw"
                                                class="form-control passwordInput "
                                                placeholder="Enter Confirm Password">
                                            @error('confirmpw')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <span id="passwordMatchMessage" class="text-danger"></span>
                                        </div>
                                        <div class="col-12">
                                            <input type="checkbox" class="form-check-input" id="togglePassword">
                                            <label class="form-check-label" for="bs-validation-checkbox">Show
                                                Password</label>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    const togglePassword = document.getElementById('togglePassword');
                    const passwordInputs = document.querySelectorAll('.passwordInput');

                    togglePassword.addEventListener('change', function() {
                        passwordInputs.forEach(function(passwordInput) {
                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                            } else {
                                passwordInput.type = 'password';
                            }
                        });

                        togglePassword.textContent = passwordInputs[0].type === 'password' ? 'Show Password' : 'Hide Password';
                    });
                    const newPasswordInput = document.getElementById('newWithTitle');
                    const confirmPasswordInput = document.getElementById('confirmWithTitle');
                    const passwordMatchMessage = document.getElementById('passwordMatchMessage');

                    // Function to check if passwords match
                    function checkPasswordMatch() {
                        const newPassword = newPasswordInput.value;
                        const confirmPassword = confirmPasswordInput.value;

                        if (newPassword === confirmPassword) {
                            passwordMatchMessage.textContent = ''; // Clear error message
                            confirmPasswordInput.classList.remove('is-invalid');
                            return true;
                        } else {
                            passwordMatchMessage.textContent = 'Passwords do not match';
                            confirmPasswordInput.classList.add('is-invalid');
                            return false;
                        }
                    }

                    // Add event listeners to both password inputs
                    newPasswordInput.addEventListener('keyup', checkPasswordMatch);
                    confirmPasswordInput.addEventListener('keyup', checkPasswordMatch);
                </script>
                @if ($errors->has('newpw') || $errors->has('currentpw') || $errors->has('confirmpw'))
                    <script>
                        $(document).ready(function() {
                            // Trigger a click event on the button when the document is ready
                            $("#ChangePasswordButton").click();
                        });
                    </script>
                @endif
                {{-- @include('pages.users.components.modalResetPassword') --}}

            </div>
            <!-- /Account -->
        </div>
    </div>

</div>
