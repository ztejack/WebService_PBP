<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'PBP') }}</title>
    @include('config.configCss-auth')


</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y ">
            <div class="authentication-inner {{ Request::is('login') ? '' : 'width-50-auth' }}">
                <!-- Register -->
                <div class="log-hover {{ Request::is('login') ? 'd-none' : '' }}">
                    <a href="{{ route('login') }}" class="px-2 d-flex vertical py-2 ">
                        {{-- <i class='bx bx-left-arrow-alt  '></i> --}}
                        <i class='bx bx-log-in-circle bx-md'></i>
                        <span class="text-primary m-auto">Login</span>
                    </a>
                </div>
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('config.configJs')
</body>

</html>
