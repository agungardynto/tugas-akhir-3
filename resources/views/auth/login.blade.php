<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} - Login</title>
    <link rel="stylesheet" href="{{ asset('css/static/bootstrap.min.css') }}">
    <link href="{{ asset('css/static/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/static/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/static/fontawesome/css/fontawesome-all.css') }}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <div class="splash-container" style="width: 375px">
        <div class="card">
            <div class="card-header text-center">
                <h1 class="text-uppercase" style="color: #5969ff">{{ env('APP_NAME') }}</h1>
            </div>
            <div class="card-body">
                @error('email')
                <div class="alert alert-warning" role="alert">Email atau password salah!</div>
                @enderror
                @error('password')
                <div class="alert alert-warning" role="alert">Email atau password salah!</div>
                @enderror
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input name="email" class="form-control form-control-lg" type="text" placeholder="Email Address" autocomplete="off" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input name="password" class="form-control form-control-lg" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('register') }}" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('password.request') }}" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
</body>
 
</html>