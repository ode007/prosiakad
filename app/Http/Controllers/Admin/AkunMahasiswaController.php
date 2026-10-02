<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunMahasiswaController extends Controller
{
    // Menampilkan semua akun mahasiswa
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.tambahAkunMhs', compact('users'));
    }

    // Menyimpan akun baru
    public function store(Request $request)
    {
        $request->validate([
            'nim'       => 'required',
            'password'  => 'required|min:6',
        ]);

        // Cek apakah NIM ada di tabel mahasiswa
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa dengan NIM ' . $request->nim . ' belum ada. Silakan buat data mahasiswa terlebih dahulu.');
        }

        // Cek apakah user sudah ada
        $userExists = User::where('nim', $request->nim)->first();
        if ($userExists) {
            return redirect()->back()->with('error', 'Akun dengan NIM ' . $request->nim . ' sudah ada.');
        }

        User::create([
            'nim'       => $request->nim,
            'password'  => ($request->password),
        ]);

        return redirect()->back()->with('success', 'Akun mahasiswa berhasil ditambahkan!');
    }

    // Hapus akun
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun mahasiswa berhasil dihapus!');
    }
}
