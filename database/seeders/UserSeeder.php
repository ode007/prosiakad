<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;        // ← Tambahkan ini
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = Mahasiswa::all();

        foreach ($mahasiswas as $mhs) {
            User::create([
                'nim' => $mhs->nim,
                'password' => Hash::make('123456'), // password default
            ]);
        }
    }
}
