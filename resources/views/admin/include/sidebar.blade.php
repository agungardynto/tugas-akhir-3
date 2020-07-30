<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @yield('dashboard')" href="{{ route('dashboard_admin') }}"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    <li class="nav-divider">
                        Features
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @yield('company')" href="{{ route('company.index') }}"><i class="fas fa-circle-notch"></i> Company</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @yield('room')" href="{{ route('room.index') }}"><i class="fas fa-fw fa-rocket"></i>Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('blog')" href="{{ route('blog.index') }}"><i class="fas fa-fw fa-newspaper"></i>Blog & Event</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @yield('contact')" href="{{ route('contact.index') }}"><i class="fas fa-fw fa-phone"></i>Contact</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @yield('faq')" href="{{ route('faq.index') }}"><i class="fas fa-fw fa-flask"></i>Frequently Asked Question</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @yield('booking')" href="{{ route('booking.index') }}"><i class="fas fa-fw fa-bookmark"></i>Check Booking</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>