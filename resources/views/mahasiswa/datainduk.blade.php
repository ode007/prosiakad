@extends('layouts.mahasiswa.app')

@section('title', 'Data Induk Mahasiswa')

@section('breadcrumb')
    <x-mahasiswa.breadcrumb>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
        <li class="breadcrumb-item active">Data Induk</li>
    </x-mahasiswa.breadcrumb>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <form action="{{ route('mahasiswa.datainduk.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- FOTO PROFIL --}}
            <div class="text-center mb-4 position-relative">
                
                <img src="{{ $mahasiswa->induk && $mahasiswa->induk->foto
                            ? asset('storage/'.$mahasiswa->induk->foto)
                            : 'https://github.com/mdo.png' }}"
                    id="profileImage"
                    class="rounded-circle shadow mb-2"
                    width="140" height="140"
                    alt="Foto Profil">

                <h5 class="fw-bold mt-3 mb-0">
                    {{ $mahasiswa->nama }}
                </h5>
                <span class="text-muted">
                    NIM : {{ $mahasiswa->nim }}
                </span>


                {{-- INPUT FILE (HIDDEN) --}}
                <input type="file" name="foto" id="photoInput" class="d-none" accept="image/*">


                {{-- TOMBOL GANTI FOTO --}}
                <div id="photoAction" class="d-none">
                    <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                            onclick="document.getElementById('photoInput').click()">
                        <i class="bi bi-camera"></i> Ganti Foto
                    </button>
                </div>

                {{-- <h5 class="fw-bold mt-3 mb-0">Nama Mahasiswa</h5>
                <span class="text-muted">NIM : 202101234</span> --}}
            </div>

            
            {{-- DATA INDUK MAHASISWA --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0">Data Induk Mahasiswa</h6>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="editInduk">
                                <i class="bi bi-pencil-square"></i> Update
                            </button>
                    
                            <button type="submit" class="btn btn-sm btn-success d-none" id="saveInduk">
                                <i class="bi bi-check-circle"></i> Simpan
                            </button>
                    
                            <button type="button" class="btn btn-sm btn-secondary d-none" id="cancelInduk">
                                Batal
                            </button>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control nama-lock" value="{{ $mahasiswa->nama }}" disabled readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control data-induk" value="{{ $mahasiswa->induk->nik ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">NPWP</label>
                            <input type="text" name="npwp" class="form-control data-induk" value="{{ $mahasiswa->induk->npwp ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">NISN</label>
                            <input type="text" name="nisn" class="form-control data-induk" value="{{ $mahasiswa->induk->nisn ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir"  class="form-control data-induk" value="{{ $mahasiswa->induk->tempat_lahir ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control data-induk" value="{{ $mahasiswa->induk->tanggal_lahir ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No. HP</label>
                            <input type="text" name="no_hp" class="form-control data-induk" value="{{ $mahasiswa->induk->no_hp ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control data-induk" value="{{ $mahasiswa->induk->jenis_kelamin ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Agama</label>
                            <input type="text" name="agama" class="form-control data-induk" value="{{ $mahasiswa->induk->agama ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Warga Negara</label>
                            <input type="text" name="warga_negara" class="form-control data-induk" value="{{ $mahasiswa->induk->warga_negara ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control data-induk" value="{{ $mahasiswa->induk->alamat ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control data-induk" value="{{ $mahasiswa->induk->email ?? '' }}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DATA ORANG TUA --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0">Data Orang Tua</h6>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="editOrtu">
                                <i class="bi bi-pencil-square"></i> Update
                            </button>
                    
                            <button class="btn btn-sm btn-success d-none" id="saveOrtu">
                                <i class="bi bi-check-circle"></i> Simpan
                            </button>
                    
                            <button type="button" class="btn btn-sm btn-secondary d-none" id="cancelOrtu">
                                Batal
                            </button>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control data-ortu" value="{{ $mahasiswa->ortu->nama_ayah ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control data-ortu" value="{{ $mahasiswa->ortu->pekerjaan_ayah ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control data-ortu" value="{{ $mahasiswa->ortu->nama_ibu ?? '' }}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control data-ortu" value="{{ $mahasiswa->ortu->pekerjaan_ibu ?? '' }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const profileImage = document.getElementById('profileImage');
    const photoInput   = document.getElementById('photoInput');
    const photoAction  = document.getElementById('photoAction');

    let originalPhoto = profileImage.src;

    function enableEdit(editBtn, saveBtn, cancelBtn, inputs, isInduk = false) {

        editBtn.addEventListener('click', () => {
            inputs.forEach(input => input.disabled = false);

            editBtn.classList.add('d-none');
            saveBtn.classList.remove('d-none');
            cancelBtn.classList.remove('d-none');

            // KHUSUS DATA INDUK → AKTIFKAN FOTO
            if (isInduk) {
                photoAction.classList.remove('d-none');
            }
        });

        cancelBtn.addEventListener('click', () => {
            inputs.forEach(input => input.disabled = true);

            editBtn.classList.remove('d-none');
            saveBtn.classList.add('d-none');
            cancelBtn.classList.add('d-none');

            // RESET FOTO
            if (isInduk) {
                photoAction.classList.add('d-none');
                profileImage.src = originalPhoto;
                photoInput.value = '';
            }
        });
    }

    // PREVIEW FOTO
    photoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => profileImage.src = e.target.result;
            reader.readAsDataURL(file);
        }
    });

    // DATA INDUK
    enableEdit(
        document.getElementById('editInduk'),
        document.getElementById('saveInduk'),
        document.getElementById('cancelInduk'),
        document.querySelectorAll('.data-induk'),
        true
    );

    // DATA ORANG TUA
    enableEdit(
        document.getElementById('editOrtu'),
        document.getElementById('saveOrtu'),
        document.getElementById('cancelOrtu'),
        document.querySelectorAll('.data-ortu')
    );

});
</script>
@endpush


