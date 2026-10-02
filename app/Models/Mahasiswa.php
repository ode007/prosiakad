<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama', 'nim', 'prodi', 'angkatan'];

    // =====================
    // RELASI DATA INDUK
    // =====================
    public function induk()
    {
        return $this->hasOne(MahasiswaInduk::class, 'mahasiswa_id');
    }

    // =====================
    // RELASI DATA ORTU
    // =====================
    public function ortu()
    {
        return $this->hasOne(MahasiswaOrtu::class, 'mahasiswa_id');
    }

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'nim');
    }
}
