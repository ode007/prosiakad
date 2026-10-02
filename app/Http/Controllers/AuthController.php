<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = User::where('nim', $request->nim)->first();

        if ($user && $request->password == $user->password) {
            Auth::guard('web')->login($user); // login manual
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->with('error', 'NIM atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        // ❗ JANGAN invalidate session
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    
}
