<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'prodi'
    ];

    public function kelasMk()
    {
        return $this->hasMany(KelasMk::class, 'mata_kuliah_id');
    }
}
