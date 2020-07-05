<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} - Register</title>
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
    <form class="splash-container" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations User</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Full Name" autocomplete="off" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email Address" autocomplete="off" value="{{ old('email') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <select name="gender" class="form-control form-control-lg @error('gender') is-invalid @enderror">
                                <option value="" selected hidden>Select Gender</option>
                                <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Male</option>
                                <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="phone_number" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Phone Number e.g 082123456789" autocomplete="off" value="{{ old('phone_number') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control form-control-lg" cols="30" rows="3" placeholder="Place Address">{{ old('address') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="{{ route('login') }}" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>
