@extends('layouts.mahasiswa.app')

@section('title', 'Daftar Mata Kuliah')

@section('content')
    <div class="content-wrapper">
        <div class="mb-3">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>


        <div class="container-fluid">

            <div class="mb-4">
                <h4 class="fw-bold">Daftar Mata Kuliah</h4>
            </div>

            {{-- Form Pencarian Mata Kuliah (Titik Uji Reflected XSS) --}}
            <div class="row mb-3">
                <div class="col-md-6 col-lg-5">
                    <form action="{{ route('mahasiswa.daftar-mk') }}" method="GET" class="d-flex gap-2">
                        <input type="text" name="search" class="form-control"
                            placeholder="Cari nama mata kuliah atau kode..." value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-primary px-3">
                            <i class="bi bi-search me-1"></i> Cari
                        </button>
                        @if (!empty($search))
                            <a href="{{ route('mahasiswa.daftar-mk') }}" class="btn btn-outline-secondary">Reset</a>
                        @endif
                    </form>
                </div>
            </div>

            @if (!empty($search))
                <div class="alert alert-info py-2 mb-3">
                    <i class="bi bi-info-circle me-1"></i> Hasil pencarian untuk kata kunci:
                    <strong>{{ $search }}</strong>
                </div>
            @endif

            <div class="card shadow-sm border-0">
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
                            @forelse ($kelasMk as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <strong>{{ $item->mataKuliah->nama_mk }}</strong><br>
                                                <small class="text-muted">
                                                    {{ $item->mataKuliah->kode_mk }} |
                                                    {{ $item->mataKuliah->sks }} SKS
                                                </small>
                                            </div>

                                            {{-- ini tidak rentan --}}
                                            {{-- <a 
                                            href="{{ route('mahasiswa.mataKuliah.detail', $item->mataKuliah->id) }}" 
                                            class="btn btn-sm btn-warning ms-2">
                                            Detail
                                        </a> --}}

                                            <a href="{{ route('mahasiswa.mataKuliah.detail') }}?id={{ $item->mataKuliah->id }}"
                                                class="btn btn-info">
                                                Detail
                                            </a>



                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <span class="badge bg-info">{{ $item->kelas }}</span>
                                    </td>
                                    <td>{{ $item->dosen->nama }}</td>
                                    <td>
                                        {{ $item->hari }}<br>
                                        <small class="text-muted">
                                            {{ substr($item->jam_mulai, 0, 5) }} -
                                            {{ substr($item->jam_selesai, 0, 5) }}
                                        </small>
                                    </td>
                                    <td class="text-center">{{ $item->ruang }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">
                                            {{ $item->kuota }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="kelas_mk_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="bi bi-plus-circle me-1"></i> Ambil
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        Tidak ada kelas mata kuliah tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
