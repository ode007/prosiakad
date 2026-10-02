<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Mahasiswa\DataIndukController;
use App\Http\Controllers\Mahasiswa\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;
use App\Http\Controllers\Admin\AkunMahasiswaController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\KelasMkController;
use App\Http\Controllers\Mahasiswa\MataKuliahController as MhsMataKuliahController;
use App\Http\Controllers\Mahasiswa\KrsController;



/*
|--------------------------------------------------------------------------
| LOGIN MAHASISWA
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| MAHASISWA (WEB GUARD)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:web', 'waf')->group(function () {

    Route::get('/', function () {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.dashboardMhs', compact('mahasiswa'));
    });

    // route detail Mk
    // Route::get('/mahasiswa/detail-mata-kuliah/{id}',
    //     [MhsMataKuliahController::class, 'detail']
    // )->name('mahasiswa.mataKuliah.detail');

    Route::get(
        '/mahasiswa/detail-mata-kuliah',
        [MhsMataKuliahController::class, 'detail']
    )->name('mahasiswa.mataKuliah.detail');

    // route lihat/preview silabus (titik uji Path Traversal / Arbitrary File Read)
    Route::get(
        '/mahasiswa/silabus/preview',
        [MhsMataKuliahController::class, 'previewSilabus']
    )->name('mahasiswa.silabus.preview');




    // route KRS 
    Route::get('/mahasiswa/krs/cetak', [KrsController::class, 'cetak'])
        ->name('mahasiswa.krs.cetak');

    // route ambil mata kuliah
    Route::get(
        '/mahasiswa/daftar-mata-kuliah',
        [MhsMataKuliahController::class, 'index']
    )->name('mahasiswa.daftar-mk');


    Route::get('/mahasiswa/profile', [ProfileController::class, 'index'])
        ->name('mahasiswa.profile');

    Route::get('/mahasiswa/data-induk', [DataIndukController::class, 'index']);

    Route::post('/mahasiswa/data-induk/update', [DataIndukController::class, 'update'])
        ->name('mahasiswa.datainduk.update');
});


Route::middleware(['auth'])->prefix('mahasiswa')->group(function () {

    Route::get('/krs', [KrsController::class, 'index'])
        ->name('mahasiswa.krs');

    Route::post('/krs', [KrsController::class, 'store'])
        ->name('mahasiswa.krs.store');

    Route::delete('/krs/{id}', [KrsController::class, 'destroy'])
        ->name('mahasiswa.krs.destroy');

    Route::get('/krs/cetak', [KrsController::class, 'cetak'])
        ->name('mahasiswa.krs.cetak');
});



/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/loginAdm', [AdminAuth::class, 'index'])->name('admin.login');
Route::post('/loginAdm', [AdminAuth::class, 'login']);
Route::get('/logoutAdm', [AdminAuth::class, 'logout']);

/*
|--------------------------------------------------------------------------
| ADMIN (ADMIN GUARD)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware('auth:admin')
    ->group(function () {

        Route::get('/home', function () {
            return view('admin.home');
        });



        // route kelas
        Route::get('/kelas', [KelasMkController::class, 'index'])->name('admin.kelas.index');
        Route::post('/kelas', [KelasMkController::class, 'store'])->name('admin.kelas.store');
        Route::put('/kelas/{id}', [KelasMkController::class, 'update'])->name('admin.kelas.update');
        Route::delete('/kelas/{id}', [KelasMkController::class, 'destroy'])->name('admin.kelas.destroy');

        // route kuliah
        Route::get('/mata-kuliah', [MataKuliahController::class, 'index'])->name('admin.mata-kuliah.index');
        Route::post('/mata-kuliah', [MataKuliahController::class, 'store'])->name('admin.mata-kuliah.store');
        Route::put('/mata-kuliah/{id}', [MataKuliahController::class, 'update'])->name('admin.mata-kuliah.update');
        Route::delete('/mata-kuliah/{id}', [MataKuliahController::class, 'destroy'])->name('admin.mata-kuliah.destroy');


        // route dosen
        Route::get('/dosen', [DosenController::class, 'index'])->name('admin.dosen');
        Route::post('/dosen', [DosenController::class, 'store'])->name('admin.dosen.store');
        Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('admin.dosen.update');
        Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('admin.dosen.destroy');

        // Route baru untuk akun mahasiswa
        Route::get('/akun-mahasiswa', [AkunMahasiswaController::class, 'index'])->name('admin.akun-mahasiswa.index');
        Route::post('/akun-mahasiswa/store', [AkunMahasiswaController::class, 'store'])->name('admin.akun-mahasiswa.store');
        Route::delete('/akun-mahasiswa/{id}', [AkunMahasiswaController::class, 'destroy'])->name('admin.akun-mahasiswa.destroy');

        Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
        Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
        Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
        Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
    });
