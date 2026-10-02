<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::orderBy('id', 'asc')->paginate(10);
        return view('admin.dosen', compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn',
            'nama' => 'required'
        ], [
            'nidn.unique' => 'NIDN sudah terdaftar',
            'nidn.required' => 'NIDN wajib diisi',
            'nama.required' => 'Nama dosen wajib diisi'
        ]);

        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'nidn' => 'required|unique:dosen,nidn,' . $dosen->id,
            'nama' => 'required'
        ], [
            'nidn.unique' => 'NIDN sudah digunakan dosen lain'
        ]);

        $dosen->update($request->all());

        return redirect()->back()->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy($id)
    {
        Dosen::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data dosen berhasil dihapus');
    }
}
