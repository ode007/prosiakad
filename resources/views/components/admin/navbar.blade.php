<nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-3">

    <!-- Toggle Sidebar (Mobile) -->
    <button class="btn btn-outline-primary d-md-none me-2"
        data-bs-toggle="offcanvas"
        data-bs-target="#sidebarMobile">
        <i class="bi bi-list"></i>
    </button>

    <!-- Search (Desktop only) -->
    <form class="d-none d-md-flex w-50">
        <input class="form-control me-2" type="search" placeholder="Search">
        <button class="btn btn-outline-primary">
            <i class="bi bi-search"></i>
        </button>
    </form>

    <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-3">
            <a class="nav-link position-relative" href="#">
                <i class="bi bi-bell-fill fs-5"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                </span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1"></i>
                <span class="d-none d-md-inline">Admin</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ url('/logoutAdm') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
