@extends('layouts.mahasiswa.app')

@section('title', 'KRS')

@section('breadcrumb')
<x-mahasiswa.breadcrumb>
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
    <li class="breadcrumb-item active">KRS</li>
</x-mahasiswa.breadcrumb>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">

        {{-- ================= HEADER ================= --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-0">Kartu Rencana Studi</h4>
                <small class="text-muted">Kelola mata kuliah yang diambil semester ini</small>
            </div>
            <a href="/mahasiswa/daftar-mata-kuliah">
                <button class="btn btn-success btn-lg shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Ambil Mata Kuliah
                </button>
            </a>
        </div>

        {{-- ================= SUMMARY CARD ================= --}}
        {{-- <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <small class="text-muted">Tahun Ajaran</small>
                        <h5 class="fw-bold mb-0">2024 / 2025</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <small class="text-muted">Semester Aktif</small>
                        <h5 class="fw-bold mb-0">
                            <span class="badge bg-primary">Ganjil</span>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <small class="text-muted">Total SKS</small>
                        <h5 class="fw-bold mb-0 text-success">18 SKS</h5>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- ================= TABEL KRS ================= --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                Daftar Mata Kuliah Diambil
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Dosen</th>
                            <th>Jadwal</th>
                            <th>Ruang</th>
                            <th>Kuota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($krs as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                        
                            <td>
                                <strong>{{ $item->kelasMk->mataKuliah->nama_mk }}</strong><br>
                                <small class="text-muted">{{ $item->kelasMk->mataKuliah->kode_mk }}</small>
                            </td>
                        
                            <td class="text-center">
                                <span class="badge bg-info">{{ $item->kelasMk->kelas }}</span>
                            </td>
                        
                            <td>
                                {{ $item->kelasMk->dosen->nama ?? '-' }}
                            </td>
                        
                            <td>
                                <span class="badge bg-light text-dark">
                                    {{ $item->kelasMk->hari }},
                                    {{ substr($item->kelasMk->jam_mulai,0,5) }} -
                                    {{ substr($item->kelasMk->jam_selesai,0,5) }}
                                </span>
                            </td>
                        
                            <td class="text-center">
                                {{ $item->kelasMk->ruang }}
                            </td>
                        
                            <td class="text-center">
                                <span class="badge bg-success">
                                    {{ $item->kelasMk->kuota }}
                                </span>
                            </td>
                        
                            <td class="text-center">
                                <form action="{{ route('mahasiswa.krs.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus mata kuliah ini dari KRS?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger shadow-sm">
                                        <i class="bi bi-trash">Hapus</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                                Belum ada mata kuliah yang diambil
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                        
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('mahasiswa.krs.cetak') }}" target="_blank"
               class="btn btn-outline-primary btn-sm">
                <i class="bi bi-printer me-1"></i> Cetak KRS
            </a>
        </div>
        

    </div>
    
    
</div>
@endsection
