<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('nama', 'asc')->paginate(5);
        return view('admin.mahasiswa', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nim'       => 'required|unique:mahasiswa,nim',
                'nama'      => 'required',
                'prodi'     => 'required',
                'angkatan'  => 'required'
            
            ],

            [
                'nim.required' => 'NIM wajib diisi',
                'nim.unique'   => 'NIM sudah terdaftar, silakan gunakan NIM lain',
            ]
        );

        

        Mahasiswa::create($request->all());

        return redirect()->back()->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate(
            [
                'nim'       => 'required|unique:mahasiswa,nim,' . $id,
                'nama'      => 'required',
                'prodi'     => 'required',
                'angkatan'  => 'required',
            ],

            [
                'nim.required' => 'NIM wajib diisi',
                'nim.unique'   => 'NIM sudah terdaftar, silakan gunakan NIM lain',
            ]
        );

        $mahasiswa->update($request->all());

        return redirect()->back()->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
