<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-navbar-fixed layout-compact layout-menu-fixed layout-menu-collapsed">
{{-- class="light-style layout-navbar-fixed layout-menu-fixed"> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.global.icon')


    <title>{{ config('app.name', 'PBP') }}</title>



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Scripts -->

    @if (Request::is('auth/profile') || Request::is('users/*/detail'))
        @include('config.configCss-profile')
        {{-- @elseif (Request::is('users/*/detail'))
        @include('config.configCss-profile') --}}
    @else
        @include('config.configCss')
    @endif

</head>

<body>
    <div id="app">
        <div id="main">
            <!-- Layout wrapper -->
            <div class="layout-wrapper layout-content-navbar">
                <div class="layout-container">
                    <!-- Menu -->

                    @include('components.global.menu')
                    <!-- / Menu -->

                    <!-- Layout container -->
                    <div class="layout-page">
                        <!-- Navbar -->

                        @include('components.global.nav')

                        <!-- / Navbar -->

                        @yield('content')
                    </div>
                    <!-- / Layout page -->
                </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>
            </div>
            <!-- / Layout wrapper -->
        </div>
    </div>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    @include('config.configJs')
</body>

</html>
