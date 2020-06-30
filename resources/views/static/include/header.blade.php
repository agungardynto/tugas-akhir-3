<header id="header" class="shadow-sm">
    <div class="helper">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 head__left">
                    <i class="fas fa-phone-alt mr-2"></i>
                    <span>(12) 345 67890</span>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 head__right">
                    <div class="email-contact">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>info@colorib@gmail.com</span>
                    </div>
                    <div class="contact-social">
                        <a href="#" class="mr-3">
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
                        </a>
                        <a href="#" class="text-uppercase booking-now">booking now</a>
                        <div class="navbar-nav ml-3">
                            <a class="nav-link dropdown-toggle" href="#drop" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('img/static/flags/united-kingdom.png') }}" alt="UnitedKingdom">
                                <span>UK</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <img src="/img/flags/germany.png" alt="germany">
                                    <span>GM</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <img src="/img/flags/indonesia.png" alt="Indonesia">
                                    <span>ID</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <img src="/img/flags/new-zealand.png" alt="NewZeland">
                                    <span>NL</span>
                                </a>
                            </div>
                        </div>
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
            <div class="collapse navbar-collapse justify-content-end" id="markup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{ route('home') }}">Home</a>
                    <a class="nav-item nav-link" href="{{ route('rooms') }}">Rooms</a>
                    <a class="nav-item nav-link" href="#">About Us</a>
                    <a class="nav-item nav-link" href="#">Pages</a>
                    <a class="nav-item nav-link" href="#">News</a>
                    <a class="nav-item nav-link" href="{{ route('contact') }}">Contact</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
