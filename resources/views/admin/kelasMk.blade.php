@extends('layouts.admin.appAdm')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        {{-- ================= HEADER ================= --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Data Kelas Mata Kuliah</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-circle me-1"></i> Tambah Kelas
            </button>
        </div>

        {{-- ================= TABLE ================= --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Kelas</th>
                            <th>Kuota</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester Aktif</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- ===== DATA ===== --}}
                        @forelse ($kelasMk as $item)
                        <tr>
                            <td class="text-center">{{ $kelasMk->firstItem() + $loop->index }}</td>
                            <td>{{ $item->mataKuliah->kode_mk }}</td>
                            <td>{{ $item->mataKuliah->nama_mk }}</td>
                            <td>{{ $item->dosen->nama }}</td>
                            <td class="text-center">{{ $item->kelas }}</td>
                            <td class="text-center">{{ $item->kuota }}</td>
                            <td class="text-center">{{ $item->tahun_ajaran }}</td>
                            <td class="text-center">{{ $item->semester_aktif }}</td>
                            <td class="text-center">{{ $item->hari }}</td>
                            <td class="text-center">{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                            <td class="text-center">{{ $item->ruang }}</td>
                            <td class="text-center">
                                {{-- TOMBOL EDIT --}}
                                <button 
                                    class="btn btn-warning btn-sm me-1 btn-edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-id="{{ $item->id }}"
                                    data-mk="{{ $item->mata_kuliah_id }}"
                                    data-dosen="{{ $item->dosen_id }}"
                                    data-kelas="{{ $item->kelas }}"
                                    data-kuota="{{ $item->kuota }}"
                                    data-semester="{{ $item->semester_aktif }}"
                                    data-tahun="{{ $item->tahun_ajaran }}"
                                    data-hari="{{ $item->hari }}"
                                    data-jam_mulai="{{ $item->jam_mulai }}"
                                    data-jam_selesai="{{ $item->jam_selesai }}"
                                    data-ruang="{{ $item->ruang }}"
                                    title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                
                                {{-- TOMBOL HAPUS --}}
                                <form action="{{ route('admin.kelas.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="text-center">Data kelas belum ada</td>
                        </tr>
                        @endforelse
                        {{-- ===== END DATA ===== --}}
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $kelasMk->links('pagination::bootstrap-5') }}
                </div>
             
            </div>
        </div>

    </div>
</div>

{{-- ================= MODAL TAMBAH ================= --}}
<form action="{{ route('admin.kelas.store') }}" method="POST">
    @csrf
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kelas Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="mata_kuliah_id" class="form-select" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($mataKuliah as $mk)
                                    <option value="{{ $mk->id }}">
                                        {{ $mk->kode_mk }} - {{ $mk->nama_mk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Dosen</label>
                            <select name="dosen_id" class="form-select" required>
                                <option value="">-- Pilih Dosen --</option>
                                @foreach ($dosen as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="A / B / C" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Kuota</label>
                            <input type="number" name="kuota" class="form-control" placeholder="30" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Semester Aktif</label>
                            <select name="semester_aktif"  class="form-select">
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Hari</label>
                            <select name="hari" class="form-select" required>
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control" required>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Ruang</label>
                            <input type="text" name="ruang" class="form-control" placeholder="R101 / Lab 1" required>
                        </div>                      

                        <div class="col-md-6">
                            <label class="form-label">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran"  class="form-control" placeholder="2024/2025" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
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
                    <h5 class="modal-title">Edit Kelas Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="mata_kuliah_id" id="edit_mk" class="form-select" required>
                                @foreach ($mataKuliah as $mk)
                                    <option value="{{ $mk->id }}">
                                        {{ $mk->kode_mk }} - {{ $mk->nama_mk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Dosen</label>
                            <select name="dosen_id" id="edit_dosen" class="form-select" required>
                                @foreach ($dosen as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Kelas</label>
                            <input type="text" name="kelas" id="edit_kelas" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Kuota</label>
                            <input type="number" name="kuota" id="edit_kuota" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Semester Aktif</label>
                            <select name="semester_aktif" id="edit_semester" class="form-select">
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Hari</label>
                            <select name="hari" id="edit_hari" class="form-select">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" name="jam_mulai" id="edit_jam_mulai" class="form-control">
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai" id="edit_jam_selesai" class="form-control">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Ruang</label>
                            <input type="text" name="ruang" id="edit_ruang" class="form-control">
                        </div>                        

                        <div class="col-md-6">
                            <label class="form-label">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" id="edit_tahun" class="form-control">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-warning">Update</button>
                </div>

            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function () {
    
                const id         = this.dataset.id;
                const mk         = this.dataset.mk;
                const dosen      = this.dataset.dosen;
                const kelas      = this.dataset.kelas;
                const kuota      = this.dataset.kuota;
                const semester   = this.dataset.semester;
                const tahun      = this.dataset.tahun;
                const hari       = this.dataset.hari;
                const jamMulai   = this.dataset.jam_mulai;
                const jamSelesai = this.dataset.jam_selesai;
                const ruang      = this.dataset.ruang;
    
                document.getElementById('formEdit').action = `/admin/kelas/${id}`;
    
                document.getElementById('edit_mk').value = mk;
                document.getElementById('edit_dosen').value = dosen;
                document.getElementById('edit_kelas').value = kelas;
                document.getElementById('edit_kuota').value = kuota;
                document.getElementById('edit_semester').value = semester;
                document.getElementById('edit_tahun').value = tahun;
    
                document.getElementById('edit_hari').value = hari;
                document.getElementById('edit_jam_mulai').value = jamMulai;
                document.getElementById('edit_jam_selesai').value = jamSelesai;
                document.getElementById('edit_ruang').value = ruang;
            });
        });
    
    });
    </script>
    
    


@endsection
