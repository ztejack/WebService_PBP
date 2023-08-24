@extends('layouts.auth')

@section('content')
    <!-- Logo -->
    <div class="app-brand justify-content-center">
        <a href="index.html" class="app-brand-link gap-2 img-fluid">

            <span class="app-brand-Logo demo">
                <img class=" img-fluid" src="img/logo/LogoBukitPrima.jpeg" alt="">

            </span>
        </a>
    </div>
    <p class="mb-4">Masukkan akun yang sudah terdaftar</p>

    <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email or Username</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Enter your email or username" value="{{ old('email') }}" required autocomplete="email"
                autofocus />
            {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{ route('password.request') }}">
                    <small>Lupa Password?</small>
                </a>
            </div>
            <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror "
                    name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember"
                    {{ old('remember') ? 'checked' : '' }} />
                <label class="form-check-label" for="remember"> Remember Me </label>
            </div>
        </div>
        <div class="">
            @error('login_error')
                <span class="text-danger my-2"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>

        </div>
    </form>
@endsection
