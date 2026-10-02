@extends('layouts.mahasiswa.app')

@section('title', 'Detail Mata Kuliah')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="mb-4">
                <h4 class="fw-bold">Detail Mata Kuliah</h4>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    @foreach ($mk as $item)
                        <table class="table table-borderless mb-4">
                            <tr>
                                <th style="width: 200px;">Kode Mata Kuliah</th>
                                <td>{{ $item->kode_mk }}</td>
                            </tr>
                            <tr>
                                <th>Nama Mata Kuliah</th>
                                <td>{{ $item->nama_mk }}</td>
                            </tr>
                            <tr>
                                <th>SKS</th>
                                <td>{{ $item->sks }}</td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td>{{ $item->semester }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $item->prodi }}</td>
                            </tr>
                            <tr>
                                <th>Dokumen Silabus / RPS</th>
                                <td>
                                    <a href="{{ route('mahasiswa.silabus.preview') }}?file=silabus-sample.pdf" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-file-earmark-text me-1"></i> Lihat Dokumen Silabus
                                    </a>
                                </td>
                            </tr>
                        </table>
                    @endforeach

                    <div class="mt-3">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
