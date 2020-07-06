<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/static/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/static/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/static/all.css') }}">
    <title>{{ env('APP_NAME') }}</title>
    @yield('css')
</head>

<body>
    @include('static.include.header')
    @yield('content')
    @include('static.include.footer')
    <script src="{{ asset('js/static/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/static/popper.min.js') }}"></script>
    <script src="{{ asset('js/static/bootstrap.js') }}"></script>
    <script src="{{ asset('js/static/app.js') }}"></script>
    <script src="{{ asset('js/static/all.js') }}"></script>
    @yield('js')
</body>

</html>
