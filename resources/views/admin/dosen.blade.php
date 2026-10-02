@extends('layouts.admin.appAdm')

@section('content')

{{-- ================= NOTIFIKASI ================= --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Manajemen Data Dosen</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDosenModal">
            + Tambah Dosen
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($dosen as $index => $item)
                        <tr>
                            {{-- NOMOR TIDAK RESET --}}
                            <td class="text-center">
                                {{ $dosen->firstItem() + $index }}
                            </td>

                            <td>{{ $item->nidn }}</td>
                            <td>{{ $item->nama }}</td>

                            <td class="text-center">
                                <button class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editDosenModal{{ $item->id }}">
                                    Edit
                                </button>

                                <form action="{{ route('admin.dosen.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data ini?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                        {{-- ================= MODAL EDIT ================= --}}
                        <div class="modal fade" id="editDosenModal{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <form method="POST" action="{{ route('admin.dosen.update', $item->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data Dosen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">NIDN</label>
                                                <input type="text" name="nidn"
                                                       class="form-control"
                                                       value="{{ $item->nidn }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Nama Dosen</label>
                                                <input type="text" name="nama"
                                                       class="form-control"
                                                       value="{{ $item->nama }}" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                Batal
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Data dosen belum tersedia
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- ================= PAGINATION ================= --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $dosen->links() }}
            </div>
            

        </div>
    </div>

</div>

{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="tambahDosenModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('admin.dosen.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" name="nidn" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
