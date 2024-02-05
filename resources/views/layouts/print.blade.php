<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PDF</title>
    {{-- @include('config.configPrintCss') --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('/vendor/css/bootstrap/bootstrap.min.css') }}"> --}}

    <!-- Core CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('/vendor/css/core.css') }}" class="template-customizer-core-css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @media print {
            body {
                /* width: 21cm;
                height: 29.7cm; */
                size: A4 landscape;
            }
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body style="background: white; size: A4 landscape;">
    @yield('content')
    {{-- @include('config.configJs') --}}
</body>

</html>
