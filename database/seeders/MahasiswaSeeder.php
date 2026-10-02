<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'nama' => 'Budi Setiawan',
                'nim' => '2021001',
                'prodi' => 'Informatika',
                'angkatan' => '2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'nim' => '2021002',
                'prodi' => 'Sistem Informasi',
                'angkatan' => '2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);//
    }
}
