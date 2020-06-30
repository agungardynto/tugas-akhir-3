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
                        <a class="nav-link @yield('dashboard')" href="{{ route('dashboard') }}"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('blog')" href="{{ route('blog.index') }}"><i class="fas fa-fw fas fa-newspaper"></i>Blog</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#"><i class="fa fa-fw fas fas fa-phone"></i>Contact</a>
                    </li>
                    <li class="nav-divider">
                        Features
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @yield('room')" href="{{ route('room.index') }}"><i class="fa fa-fw fas fa-child"></i>Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-fw fa-columns"></i>Icons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-fw fa-map-marker-alt"></i>Maps</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>