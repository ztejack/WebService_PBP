<div class="modal-onboarding modal animate__animated animate__zoomIn" id="modalPassword" tabindex="-1"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content text-center">
            <div class="modal-header border-0">
                {{-- <a class="text-muted close-label" href="javascript:void(0);" data-bs-dismiss="modal">Skip Intro</a> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body onboarding-horizontal">
                <div class="onboarding-media">
                    <img src="/img/illustrations/girl-unlock-password-light.png" alt="boy-verify-email-light"
                        width="273" class="img-fluid" data-app-dark-img="illustrations/boy-verify-email-dark.png"
                        data-app-light-img="illustrations/girl-unlock-password-light.png">
                </div>
                <div class="onboarding-content mb-0 w-100">
                    <h4 class="onboarding-title text-body">Reset Password</h4>
                    <div class="onboarding-info">Pastikan Password sudah benar</div>
                    <div class="onboarding-info mb-3">Selalu jaga kerahasiaan password anda demi melindungi data yang
                        ada di
                        dalamnya</div>
                    <form action="{{ route('change.password') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Lama</label>
                                    <input class="form-control" placeholder="Masukkan Password Anda" type="password"
                                        value="" tabindex="0" id="password" name="current_password" required>
                                    @error('current_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 d-flex">
                                    <a id="togglepassword" href="JavaScript:void(0)" class="pe-auto">
                                        <i id="toggleicon" class="bx bx-show"></i>
                                        Tampilkan Password
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="new-password" class="form-label">Password Baru</label>
                                    <input class="form-control" placeholder="Masukkan Password baru" type="password"
                                        value="" tabindex="0" id="new-password" name="new_password" required>
                                    @error('new_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new-password-confirmation" class="form-label">Ulangi Password</label>
                                    <input class="form-control" placeholder="Ulangi password" type="password"
                                        value="" tabindex="0" id="new-password-confirmation"
                                        name="new_confirm_password" required>
                                    @error('new-password-confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex">
                                @if (!empty($errors))
                                    @foreach ($errors->all() as $error)
                                        <input hidden type="checkbox" name="modalcbx" id="modalcbx" checked>
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                                {{-- @if (session()->has('modal'))
                                @endif --}}


                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-label-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
