<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function index()
    {
        return view('loginAdm');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // regenerate session
            $request->session()->regenerate();

            return redirect('/admin/home');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        //  JANGAN invalidate session
        $request->session()->regenerateToken();

        return redirect('/loginAdm');
    }
}
