<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas_mk', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mata_kuliah_id')
                ->constrained('mata_kuliah')
                ->onDelete('cascade');

            $table->foreignId('dosen_id')
                ->constrained('dosen')
                ->onDelete('cascade');

            $table->string('kelas'); // A, B, C
            $table->integer('kuota');

            $table->string('tahun_ajaran'); // contoh: 2024/2025
            $table->string('semester_aktif'); // Ganjil / Genap

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_mk');
    }
};
