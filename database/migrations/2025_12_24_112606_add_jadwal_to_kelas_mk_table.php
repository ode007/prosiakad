<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('kelas_mk', function (Blueprint $table) {
            $table->string('hari')->after('kuota');
            $table->time('jam_mulai')->after('hari');
            $table->time('jam_selesai')->after('jam_mulai');
            $table->string('ruang')->after('jam_selesai');
        });
    }

    public function down(): void
    {
        Schema::table('kelas_mk', function (Blueprint $table) {
            $table->dropColumn([
                'hari',
                'jam_mulai',
                'jam_selesai',
                'ruang'
            ]);
        });
    }
};
