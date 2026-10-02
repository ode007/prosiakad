<div id="sidebar" class="sidebar d-flex flex-column vh-100">
    <div class="sidebar-header p-3 d-flex align-items-center justify-content-between text-white">
        <div class="d-flex align-items-center sidebar-brand overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-mortarboard flex-shrink-0" viewBox="0 0 16 16">
                <path
                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917zM8 8.46 1.758 5.965 8 3.052l6.242 2.913z" />
            </svg>
            <span class="fs-5 fw-bold ms-2 sidebar-text text-nowrap">Sistem Akademik</span>
        </div>

        <!-- Tombol Toggle Sidebar di Sisi Sidebar -->
        <button class="btn btn-sm text-white p-1 border-0 d-flex align-items-center justify-content-center"
            id="sidebarToggle" type="button" aria-label="Toggle Sidebar" title="Sembunyikan / Tampilkan Sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </button>
    </div>

    <div class="p-3 overflow-auto flex-grow-1">
        <ul class="nav nav-pills flex-column gap-1">
            <li class="nav-item">
                <a href="/" class="nav-link text-dark d-flex align-items-center" title="Home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-house flex-shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg>
                    <span class="ms-2 sidebar-text">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/mahasiswa/profile" class="nav-link text-dark d-flex align-items-center" title="Profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-person flex-shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <span class="ms-2 sidebar-text">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/mahasiswa/data-induk" class="nav-link text-dark d-flex align-items-center" title="Data Induk">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-columns-gap flex-shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                    </svg>
                    <span class="ms-2 sidebar-text">Data Induk</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/mahasiswa/krs" class="nav-link text-dark d-flex align-items-center" title="KRS">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-file-earmark-break flex-shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M14 4.5V9h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v7H2V2a2 2 0 0 1 2-2h5.5zM13 12h1v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2h1v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z" />
                    </svg>
                    <span class="ms-2 sidebar-text">KRS</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark d-flex align-items-center" title="Jadwal Kuliah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-calendar-check flex-shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                    </svg>
                    <span class="ms-2 sidebar-text">Jadwal Kuliah</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="dropdown mt-auto sticky-bottom p-3 sidebar-profile">
        <hr>
        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false" title="Profile">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle flex-shrink-0">
            <strong class="ms-2 sidebar-text">Profile</strong>
        </a>

        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>