@extends('layouts.mahasiswa.app')

@section('title', 'Profile Mahasiswa')

@section('breadcrumb')
    <x-mahasiswa.breadcrumb>
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </x-mahasiswa.breadcrumb>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">

                <h5 class="fw-bold mb-4">Profil Mahasiswa</h5>

                <div class="row">

                    {{-- Foto & Identitas --}}
                    <div class="col-md-4 text-center border-end">
                        <img src="{{ $mahasiswa->induk && $mahasiswa->induk->foto? asset('storage/'.$mahasiswa->induk->foto) : 'https://github.com/mdo.png' }}" class="rounded-circle mb-3 shadow-sm" width="150" height="150">
                
                        <h6 class="fw-bold mb-1">{{ $mahasiswa->nama }}</h6>
                        <span class="text-muted d-block mb-3">NIM: {{ $mahasiswa->nim }}</span>
                        <span class="badge bg-primary">Aktif</span>
                    </div>

                    {{-- Data Profile --}}
                    <div class="col-md-8 ps-md-4 mt-4 mt-md-0">
                        <form id="profileForm">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" value="{{ $mahasiswa->prodi }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Angkatan</label>
                                    <input type="text" class="form-control" value="{{ $mahasiswa->angkatan }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{ $mahasiswa->induk->tempat_lahir ?? '-' }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="{{ $mahasiswa->induk->tanggal_lahir ?? '' }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="{{ $mahasiswa->induk->jenis_kelamin ?? '-' }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">No. HP</label>
                                    <input type="text" class="form-control" value="{{ $mahasiswa->induk->no_hp ?? '-' }}" disabled>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" rows="2" disabled>{{ $mahasiswa->induk->alamat ?? '-' }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Email Pribadi</label>
                                <input type="email" class="form-control" value="{{ $mahasiswa->induk->email ?? '-' }}" disabled>
                            </div>

                            {{-- <div class="text-end">
                                <button type="button" class="btn btn-outline-secondary me-2 d-none" id="btnCancel">
                                    Batal
                                </button>
                                <button type="button" class="btn btn-primary" id="btnEdit">
                                    Update Profile
                                </button>
                                <button type="submit" class="btn btn-success d-none" id="btnSave">
                                    Simpan Perubahan
                                </button>
                            </div> --}}

                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
@endsection

{{-- @push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('btnEdit').addEventListener('click', function () {
        document.querySelectorAll('#profileForm input, #profileForm textarea').forEach(el => {
            el.disabled = false;
        });

        this.classList.add('d-none');
        document.getElementById('btnSave').classList.remove('d-none');
        document.getElementById('btnCancel').classList.remove('d-none');
    });

    document.getElementById('btnCancel').addEventListener('click', function () {
        document.querySelectorAll('#profileForm input, #profileForm textarea').forEach(el => {
            el.disabled = true;
        });

        document.getElementById('btnEdit').classList.remove('d-none');
        document.getElementById('btnSave').classList.add('d-none');
        this.classList.add('d-none');
    });

});
</script>
@endpush --}}

    
