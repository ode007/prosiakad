<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = [
        'nidn',
        'nama'
    ];

    public function kelasMk()
    {
        return $this->hasMany(KelasMk::class, 'dosen_id');
    }
}
