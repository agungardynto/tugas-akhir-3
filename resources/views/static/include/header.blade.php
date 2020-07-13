<header id="header" class="shadow-sm">
    <div class="helper">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 head__left">
                    <i class="fas fa-phone-alt mr-2"></i>
                    <span>{{ $contact->phone }}</span>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 head__right">
                    <div class="email-contact">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>{{ $contact->email }}</span>
                    </div>
                    <div class="contact-social">
                        {{-- <a href="#" class="mr-3">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="mr-3">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="mr-3">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="mr-3">
                            <i class="fab fa-instagram"></i>
                        </a> --}}
                        <a href="{{ route('rooms') }}" class="text-uppercase booking-now mr-0">booking now</a>
                        @guest
                        <a href="{{ route('login') }}" class="text-uppercase booking-now bg-primary mx-0">login</a>
                        @else
                        <div class="navbar-nav ml-3">
                            <a class="nav-link dropdown-toggle" href="#drop" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Storage::url(Auth::user()->foto) }}" alt="usr_img">
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="@if (Auth::user()->role === '1')
                                {{ url('admin') }}
                                @else
                                {{ url('user') }}
                                @endif"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="/">Draumastofa<span>.</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#markup"
                aria-controls="markup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end mr-2" id="markup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{ route('home') }}">Home</a>
                    <a class="nav-item nav-link" href="{{ route('rooms') }}">Rooms</a>
                    <a class="nav-item nav-link" href="{{ route('blog') }}">Blog & Event</a>
                    <a class="nav-item nav-link" href="{{ route('contact') }}">Contact</a>
                </div>
            </div>
        </div>
    </nav>
</header>
