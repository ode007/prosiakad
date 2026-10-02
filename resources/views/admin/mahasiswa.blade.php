@extends('layouts.admin.appAdm')

@section('content')
<div class="content-wrapper">

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('updated'))
        <div class="alert alert-info alert-dismissible fade show">
            <i class="bi bi-pencil-square me-2"></i>
            {{ session('updated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-trash me-2"></i>
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Manajemen Data Mahasiswa</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
        </button>
    </div>

    <!-- Card Table -->
    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Angkatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswa as $index => $mhs)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->prodi }}</td>
                                <td>{{ $mhs->angkatan }}</td>
                                <td class="text-center">                                    
                                    
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $mhs->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>                          

                                    <form action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger btn-sm"
                                              onclick="return confirm('Yakin hapus data mahasiswa ini?')">
                                          <i class="bi bi-trash"></i>
                                      </button>
                                  </form>


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Data mahasiswa belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>                    
                </table>
            </div>

            <div class="mt-3 d-flex justify-content-center">
                {{ $mahasiswa->links() }}
            </div>
            


            {{-- modal edit --}}
            @foreach ($mahasiswa as $mhs)
            <div class="modal fade" id="edit{{ $mhs->id }}">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <form action="{{ route('admin.mahasiswa.update', $mhs->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Edit Mahasiswa</h5>
                            </div>

                            <div class="modal-body">
                                <input type="text" name="nim" class="form-control mb-2" value="{{ $mhs->nim }}">
                                <input type="text" name="nama" class="form-control mb-2" value="{{ $mhs->nama }}">
                                <input type="text" name="prodi" class="form-control mb-2" value="{{ $mhs->prodi }}">
                                <input type="number" name="angkatan" class="form-control" value="{{ $mhs->angkatan }}">
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Program Studi</label>
                            <select name="prodi" class="form-select" required>
                                <option selected disabled>Pilih Prodi</option>
                                <option>Teknik Informatika</option>
                                <option>Teknik Elektro</option>
                                <option>Teknik Mesin</option>
                                <option>Teknik Sipil</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Angkatan</label>
                            <input type="number" name="angkatan" class="form-control" placeholder="2022" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

            

        </div>
    </div>
</div>
@endsection
