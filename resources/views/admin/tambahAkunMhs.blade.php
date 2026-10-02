@extends('layouts.admin.appAdm')

@section('content')
<div class="content-wrapper">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Manajemen Akun Mahasiswa</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAkunModal">
            <i class="bi bi-plus-lg"></i> Tambah Akun
        </button>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Alert Error -->
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Tabel User -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Password</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>••••••••</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <form action="{{ route('admin.akun-mahasiswa.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data user.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Tambah Akun -->
<div class="modal fade" id="tambahAkunModal" tabindex="-1" aria-labelledby="tambahAkunLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.akun-mahasiswa.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="tambahAkunLabel"><i class="bi bi-person-plus"></i> Tambah Akun Mahasiswa</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Akun</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
