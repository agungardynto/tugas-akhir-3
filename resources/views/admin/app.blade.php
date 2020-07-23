<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <link href="{{ asset('css/admin/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/fontawesome/css/fontawesome-all.css') }}">
    <title>{{ env('APP_NAME') }} - {{ $title }}</title>
    @stack('css')
    @yield('css')
</head>

<body>
    <div class="dashboard-main-wrapper">
        @include('admin.include.header')
        
        @include('admin.include.sidebar')
        
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                @yield('content')

            </div>
            @include('admin.include.footer')
            
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/admin/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('js/admin/main-js.js') }}"></script>
    @stack('js')
    @yield('js')
</body>

</html>