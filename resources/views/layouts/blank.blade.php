<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('config.configCss')
    <style>
        @media print {
            body {
                /* width: 21cm;
                height: 29.7cm; */
                size: A4 landscape;
            }
        }
    </style>
</head>

<body style="background: white; size: A4 landscape;">
    @yield('content')
    {{-- @include('config.configJs') --}}
</body>
</html>
