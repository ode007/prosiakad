<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaInduk extends Model
{
    protected $table = 'mahasiswa_induk';

    protected $fillable = [
        'mahasiswa_id',
        'nik',
        'npwp',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'jenis_kelamin',
        'agama',
        'warga_negara',
        'alamat',
        'email',
        'foto'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
