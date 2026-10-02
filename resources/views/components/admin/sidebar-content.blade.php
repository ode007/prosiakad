<h4 class="text-white mb-4 text-center d-none d-md-block">
    Admin SIAKAD
</h4>

<ul class="nav flex-column gap-1">

    <li class="nav-item">
        <a class="nav-link rounded px-3" href="/admin/home">
            <i class="bi bi-house-door me-2"></i> Home
        </a>
    </li>

    {{-- ================= Kemahasiswaan ================= --}}
    <li class="nav-item">
        <a class="nav-link rounded px-3" data-bs-toggle="collapse" href="#menuKemahasiswaan">
            <i class="bi bi-people-fill me-2"></i> Kemahasiswaan
        </a>

        <div class="collapse ps-3" id="menuKemahasiswaan">
            <a class="nav-link rounded px-3" href="/admin/mahasiswa">
                <i class="bi bi-folder me-2"></i> Manajemen Data
            </a>
            <a class="nav-link rounded px-3" href="/admin/akun-mahasiswa">
                <i class="bi bi-person-badge me-2"></i> Akun
            </a>
        </div>
    </li>

    {{-- ================= Dosen ================= --}}
    <li class="nav-item">
        <a class="nav-link rounded px-3" href="/admin/dosen">
            <i class="bi bi-person-badge-fill me-2"></i> Dosen
        </a>
    </li>

    {{-- ================= Mata Kuliah (SUB MENU) ================= --}}
    <li class="nav-item">
        <a class="nav-link rounded px-3" data-bs-toggle="collapse" href="#menuMatakuliah">
            <i class="bi bi-journal-bookmark-fill me-2"></i> Mata Kuliah
        </a>

        <div class="collapse ps-3" id="menuMatakuliah">
            <a class="nav-link rounded px-3" href="/admin/mata-kuliah">
                <i class="bi bi-book me-2"></i> Data Mata Kuliah
            </a>
            <a class="nav-link rounded px-3" href="/admin/kelas">
                <i class="bi bi-diagram-3 me-2"></i> Manajemen Kelas
            </a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link rounded px-3" href="#">
            <i class="bi bi-card-checklist me-2"></i> KRS
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link rounded px-3" href="#">
            <i class="bi bi-gear-fill me-2"></i> Pengaturan
        </a>
    </li>

</ul>
