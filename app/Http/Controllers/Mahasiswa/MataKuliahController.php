<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\KelasMk;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = KelasMk::with(['mataKuliah', 'dosen'])
            ->orderBy('hari')
            ->orderBy('jam_mulai');

        if ($search) {
            $query->whereHas('mataKuliah', function ($q) use ($search) {
                $q->where('nama_mk', 'like', "%{$search}%")
                    ->orWhere('kode_mk', 'like', "%{$search}%");
            });
        }

        $kelasMk = $query->get();

        return view('mahasiswa.daftarMk', compact('kelasMk', 'search'));
    }

    // public function detail($id)
    // {
    //     $mk = MataKuliah::findOrFail($id);

    //     return view('mahasiswa.detailMk', compact('mk'));
    // }


    // public function detail($id)
    // {
    //     $query = "SELECT * FROM mata_kuliah WHERE id = $id";
    //     $mk = DB::select($query);

    //     // Karena DB::select() return array
    //     $mk = $mk[0] ?? null;

    //     return view('mahasiswa.detailMk', compact('mk'));
    // }

    public function detail(Request $request)
    {
        $id = $request->query('id');

        $query = "SELECT * FROM mata_kuliah WHERE id = ?";
        $mk = DB::select($query, [$id]);

        return view('mahasiswa.detailMk', [
            'mk' => $mk
        ]);
    }

    public function previewSilabus(Request $request)
    {
        $file = $request->query('file');

        if (!$file) {
            return back()->with('error', 'Parameter file tidak boleh kosong.');
        }

        $filename = basename($file);
        $baseDir = public_path('documents');
        $filePath = $baseDir . DIRECTORY_SEPARATOR . $filename;

        $realPath = realpath($filePath);
        $realBaseDir = realpath($baseDir);

        if ($realPath && $realBaseDir && str_starts_with($realPath, $realBaseDir) && file_exists($realPath)) {
            return response()->file($realPath, [
                'Content-Type' => 'text/plain; charset=utf-8'
            ]);
        }

        return back()->with('error', 'Dokumen silabus tidak ditemukan atau akses ditolak.');
    }
}
