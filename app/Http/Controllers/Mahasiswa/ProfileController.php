<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();          // user login
        $mahasiswa = $user->mahasiswa; // relasi via NIM

        // load relasi induk
        $mahasiswa->load('induk');

        return view('mahasiswa.profile', compact('mahasiswa'));
    }
}
