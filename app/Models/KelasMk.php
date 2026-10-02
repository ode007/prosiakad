<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasMk extends Model
{
    protected $table = 'kelas_mk';

    protected $fillable = [
        'mata_kuliah_id',
        'dosen_id',
        'kelas',
        'kuota',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruang',
        'tahun_ajaran',
        'semester_aktif'
    ];

    // relasi ke mata kuliah
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    // relasi ke dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
