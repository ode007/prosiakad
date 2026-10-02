<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class KrsController extends Controller
{
   

    public function index()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            abort(403, 'Data mahasiswa tidak ditemukan');
        }

        $krs = Krs::with('kelasMk.mataKuliah', 'kelasMk.dosen')
            ->where('mahasiswa_id', $mahasiswa->id)
            ->join('kelas_mk', 'krs.kelas_mk_id', '=', 'kelas_mk.id')
            ->orderByRaw("
            FIELD(kelas_mk.hari, 
                'Senin', 
                'Selasa', 
                'Rabu', 
                'Kamis', 
                'Jumat', 
                'Sabtu'
            )
        ")
            ->orderBy('kelas_mk.jam_mulai', 'asc')
            ->select('krs.*')
            ->get();

        return view('mahasiswa.daftarKrs', compact('krs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_mk_id' => 'required'
        ]);

        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            abort(403);
        }

        $cek = Krs::where('mahasiswa_id', $mahasiswa->id)
            ->where('kelas_mk_id', $request->kelas_mk_id)
            ->first();

        if ($cek) {
            return back()->with('error', 'Mata kuliah sudah diambil');
        }

        Krs::create([
            'mahasiswa_id' => $mahasiswa->id,
            'kelas_mk_id'  => $request->kelas_mk_id,
            'status'       => 'draft'
        ]);

        return redirect()->route('mahasiswa.krs')
            ->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Krs::findOrFail($id)->delete();

        return back()->with('success', 'Mata kuliah dihapus dari KRS');
    }

    
    public function cetak()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        $krs = Krs::with('kelasMk.mataKuliah', 'kelasMk.dosen')
            ->where('mahasiswa_id', $mahasiswa->id)
            ->join('kelas_mk', 'krs.kelas_mk_id', '=', 'kelas_mk.id')
            ->orderByRaw("
            FIELD(kelas_mk.hari, 
                'Senin', 
                'Selasa', 
                'Rabu', 
                'Kamis', 
                'Jumat', 
                'Sabtu'
            )
        ")
            ->orderBy('kelas_mk.jam_mulai', 'asc')
            ->select('krs.*')
            ->get();

        $pdf = Pdf::loadView('mahasiswa.krsPdf', compact('mahasiswa', 'krs'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('krs-' . $mahasiswa->nim . '.pdf');
    }
}
