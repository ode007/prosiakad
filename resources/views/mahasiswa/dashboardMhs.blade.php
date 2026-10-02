@extends('layouts.mahasiswa.app')

@section('title', 'Dashboard')

@section('breadcrumb')
    <x-mahasiswa.breadcrumb>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </x-mahasiswa.breadcrumb>
@endsection

@section('content')

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">
                Selamat Datang, {{ auth()->user()->mahasiswa->nama }}
            </h3>
            

            <small class="text-muted">Sistem Informasi Akademik</small>
        </div>
    </div>

    {{-- Ringkasan --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">IPK</p>
                    <h3 class="fw-bold">3.65</h3>
                    <small class="text-success">Bagus — pertahankan!</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Total SKS</p>
                    <h3 class="fw-bold">92</h3>
                    <small class="text-muted">Diambil hingga saat ini</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Status Akademik</p>
                    <span class="badge bg-success px-3 py-2 rounded-pill">Aktif</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Semester Berjalan</p>
                    <h3 class="fw-bold">Semester 5</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Jadwal & Pengumuman --}}
    <div class="row g-3">

        <div class="col-md-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">
                    Jadwal Kuliah Hari Ini
                </div>
                <div class="card-body">

                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <div>
                            <strong>Basis Data</strong><br>
                            <small class="text-muted">Dosen: Budi Santoso, M.Kom</small>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary">08:00 - 09:40</span><br>
                            <small class="text-muted">Ruang C-203</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <div>
                            <strong>Pemrograman Web</strong><br>
                            <small class="text-muted">Dosen: Lina Putri, M.T</small>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary">10:00 - 11:40</span><br>
                            <small class="text-muted">Lab Komputer 2</small>
                        </div>
                    </div>

                    <p class="text-muted mt-3 mb-0">
                        *Jika tidak ada jadwal, halaman ini akan kosong.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold">
                    Pengumuman Kampus
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <strong>Pembayaran UKT Gelombang 2</strong>
                        <p class="mb-1">Batas akhir tanggal 15 Januari 2026.</p>
                        <small class="text-muted">Diposting: 10 Januari 2026</small>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <strong>Pendaftaran Beasiswa PPA</strong>
                        <p class="mb-1">Silakan mengisi formulir di menu beasiswa.</p>
                        <small class="text-muted">Diposting: 7 Januari 2026</small>
                    </div>

                </div>
            </div>
        </div>

    </div>

    

@endsection
