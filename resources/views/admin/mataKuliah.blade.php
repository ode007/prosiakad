@extends('layouts.admin.appAdm')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        {{-- ================= HEADER ================= --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Data Mata Kuliah</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-circle me-1"></i> Tambah Mata Kuliah
            </button>
        </div>

        {{-- ================= NOTIFIKASI ================= --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ================= TABEL ================= --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Prodi</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mataKuliah as $i => $mk)
                        <tr>
                            <td class="text-center">{{ $mataKuliah->firstItem() + $i }}</td>
                            <td>{{ $mk->kode_mk }}</td>
                            <td>{{ $mk->nama_mk }}</td>
                            <td class="text-center">{{ $mk->sks }}</td>
                            <td class="text-center">{{ $mk->semester }}</td>
                            <td>{{ $mk->prodi }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-id="{{ $mk->id }}"
                                    data-kode="{{ $mk->kode_mk }}"
                                    data-nama="{{ $mk->nama_mk }}"
                                    data-sks="{{ $mk->sks }}"
                                    data-semester="{{ $mk->semester }}"
                                    data-prodi="{{ $mk->prodi }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <button class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalHapus"
                                    data-id="{{ $mk->id }}"
                                    data-nama="{{ $mk->nama_mk }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Data mata kuliah belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted small">
                        Menampilkan 
                        {{ $mataKuliah->firstItem() }} 
                        sampai 
                        {{ $mataKuliah->lastItem() }} 
                        dari 
                        {{ $mataKuliah->total() }} data
                    </div>
                
                    <div>
                        {{ $mataKuliah->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>

{{-- ================= MODAL TAMBAH ================= --}}
<form action="{{ route('admin.mata-kuliah.store') }}" method="POST">
@csrf
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mata Kuliah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Kode MK</label>
                        <input type="text" name="kode_mk" class="form-control" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama_mk" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">SKS</label>
                        <input type="number" name="sks" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Semester</label>
                        <input type="number" name="semester" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="prodi" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>

{{-- ================= MODAL EDIT ================= --}}
<form id="formEdit" method="POST">
@csrf
@method('PUT')
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Mata Kuliah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Kode MK</label>
                        <input type="text" name="kode_mk" class="form-control" id="edit_kode" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama_mk" class="form-control" id="edit_nama" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">SKS</label>
                        <input type="number" name="sks" class="form-control" id="edit_sks" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Semester</label>
                        <input type="number" name="semester" class="form-control" id="edit_semester" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="prodi" class="form-control" id="edit_prodi" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </div>
    </div>
</div>
</form>

{{-- ================= MODAL HAPUS ================= --}}
<form id="formHapus" method="POST">
@csrf
@method('DELETE')
<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus mata kuliah <strong id="hapusNama"></strong>?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
</form>

{{-- ================= SCRIPT ================= --}}
<script>
    const modalEdit = document.getElementById('modalEdit');
    modalEdit.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;

        document.getElementById('formEdit').action =
            `/admin/mata-kuliah/${btn.getAttribute('data-id')}`;

        document.getElementById('edit_kode').value = btn.getAttribute('data-kode');
        document.getElementById('edit_nama').value = btn.getAttribute('data-nama');
        document.getElementById('edit_sks').value = btn.getAttribute('data-sks');
        document.getElementById('edit_semester').value = btn.getAttribute('data-semester');
        document.getElementById('edit_prodi').value = btn.getAttribute('data-prodi');
    });

    const modalHapus = document.getElementById('modalHapus');
    modalHapus.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;

        document.getElementById('hapusNama').innerText =
            btn.getAttribute('data-nama');

        document.getElementById('formHapus').action =
            `/admin/mata-kuliah/${btn.getAttribute('data-id')}`;
    });
</script>

@endsection
