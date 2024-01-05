<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Membandingkan peran tanpa memperhatikan perbedaan kapitalisasi
            if (strcasecmp($user->role, 'admin') === 0) {
                return redirect()->intended('/siswa');
            } else {
                return redirect()->intended('/absensi');
            }
        }
        
        // Tambahan kode untuk menangani kasus gagal login (jika diperlukan)
        return redirect()->route('login')->with(['error' => 'Email atau password salah']);
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}