@extends('layouts.admin.appAdm')

@section('content')
<div class="content-wrapper">

    <h4 class="mb-4">Dashboard</h4>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Mahasiswa</h6>
                        <h4>1.250</h4>
                    </div>
                    <i class="bi bi-people-fill card-icon text-primary"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Dosen</h6>
                        <h4>75</h4>
                    </div>
                    <i class="bi bi-person-badge-fill card-icon text-success"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Mata Kuliah</h6>
                        <h4>120</h4>
                    </div>
                    <i class="bi bi-journal-bookmark-fill card-icon text-warning"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>KRS Aktif</h6>
                        <h4>980</h4>
                    </div>
                    <i class="bi bi-card-checklist card-icon text-danger"></i>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
