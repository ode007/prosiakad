<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\MahasiswaInduk;
use App\Models\MahasiswaOrtu;
use Illuminate\Support\Facades\Storage;


class DataIndukController extends Controller
{
    public function index()
    {
        $user = Auth::user();              // ambil user login
        $mahasiswa = $user->mahasiswa;     // relasi via NIM

        // load relasi induk & ortu
        $mahasiswa->load(['induk', 'ortu']);

        return view('mahasiswa.datainduk', compact('mahasiswa'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        // ==========================
        // VALIDASI
        // ==========================
        $request->validate([
            'nik' => 'nullable|string',
            'npwp' => 'nullable|string',
            'nisn' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'no_hp' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string',
            'agama' => 'nullable|string',
            'warga_negara' => 'nullable|string',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'nama_ayah' => 'nullable|string',
            'pekerjaan_ayah' => 'nullable|string',
            'nama_ibu' => 'nullable|string',
            'pekerjaan_ibu' => 'nullable|string',
        ]);

        // ==========================
        // DATA INDUK
        // ==========================
        $induk = $mahasiswa->induk ?? new MahasiswaInduk([
            'mahasiswa_id' => $mahasiswa->id
        ]);

        // UPLOAD FOTO
        if ($request->hasFile('foto')) {
            if ($induk->foto && Storage::disk('public')->exists($induk->foto)) {
                Storage::disk('public')->delete($induk->foto);
            }

            $path = $request->file('foto')->store('foto_mahasiswa', 'public');
            $induk->foto = $path;
        }

        $induk->fill($request->only([
            'nik',
            'npwp',
            'nisn',
            'tempat_lahir',
            'tanggal_lahir',
            'no_hp',
            'jenis_kelamin',
            'agama',
            'warga_negara',
            'alamat',
            'email'
        ]));

        $induk->save();

        // ==========================
        // DATA ORTU
        // ==========================
        $ortu = $mahasiswa->ortu ?? new MahasiswaOrtu([
            'mahasiswa_id' => $mahasiswa->id
        ]);

        $ortu->fill($request->only([
            'nama_ayah',
            'pekerjaan_ayah',
            'nama_ibu',
            'pekerjaan_ibu'
        ]));

        $ortu->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
}
