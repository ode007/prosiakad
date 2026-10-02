<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    // ======================
    // TAMPIL DATA
    // ======================
    public function index()
    {
        $mataKuliah = MataKuliah::orderBy('semester')->paginate(10);
        return view('admin.mataKuliah', compact('mataKuliah'));
    }

    // ======================
    // SIMPAN DATA
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk'  => 'required|unique:mata_kuliah,kode_mk',
            'nama_mk'  => 'required',
            'sks'      => 'required|integer',
            'semester' => 'required|integer',
            'prodi'    => 'required',
        ]);

        MataKuliah::create($request->all());

        return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    // ======================
    // UPDATE DATA
    // ======================
    public function update(Request $request, $id)
    {
        $mk = MataKuliah::findOrFail($id);

        $request->validate([
            'kode_mk'  => 'required|unique:mata_kuliah,kode_mk,' . $id,
            'nama_mk'  => 'required',
            'sks'      => 'required|integer',
            'semester' => 'required|integer',
            'prodi'    => 'required',
        ]);

        $mk->update($request->all());

        return redirect()->back()->with('success', 'Mata kuliah berhasil diperbarui');
    }

    // ======================
    // HAPUS DATA
    // ======================
    public function destroy($id)
    {
        MataKuliah::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Mata kuliah berhasil dihapus');
    }
}
