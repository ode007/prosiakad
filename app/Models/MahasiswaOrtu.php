<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaOrtu extends Model
{
    protected $table = 'mahasiswa_ortu';

    protected $fillable = [
        'mahasiswa_id',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
