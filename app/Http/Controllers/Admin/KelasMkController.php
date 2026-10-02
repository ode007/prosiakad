<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelasMk;
use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class KelasMkController extends Controller
{
    public function index()
    {
        $kelasMk = KelasMk::with(['mataKuliah', 'dosen'])->orderBy('tahun_ajaran', 'desc')->orderBy('semester_aktif')->paginate(5);
        $mataKuliah = MataKuliah::orderBy('nama_mk')->get();
        $dosen = Dosen::orderBy('nama')->get();

        return view('admin.kelasMk', compact('kelasMk', 'mataKuliah', 'dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'kelas' => 'required',
            'kuota' => 'required|integer',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required',
            'tahun_ajaran' => 'required',
            'semester_aktif' => 'required',
        ]);

        KelasMk::create($request->all());

        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $kelasMk = KelasMk::findOrFail($id);

        $kelasMk->update($request->all());

        return redirect()->back()->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy($id)
    {
        KelasMk::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Kelas berhasil dihapus');
    }
}
