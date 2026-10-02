<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\KelasMk;

class Krs extends Model
{
    protected $table = 'krs';

    protected $fillable = [
        'mahasiswa_id',
        'kelas_mk_id',
        'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function kelasMk()
    {
        return $this->belongsTo(KelasMk::class, 'kelas_mk_id');
    }
}
