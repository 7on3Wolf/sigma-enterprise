<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Tampilan form login
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255', // Validasi untuk 'name'
            'password' => 'required|min:8', // Validasi untuk 'password'
            'remember' => 'nullable', // Validasi untuk 'remember' jika ada
        ]);

        // Mencoba login dengan 'name' dan 'password'
        if (Auth::attempt($request->only('name', 'password'), $request->remember)) {
            // Mendapatkan pengguna yang sudah login
            $user = Auth::user();

            // Mengecek peran pengguna
            if ($user->role === 'admin') {
                // Mengarahkan ke halaman dashboard admin jika pengguna adalah admin
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'customer') {
                // Mengarahkan ke halaman customer setelah login jika pengguna adalah customer
                return redirect()->route('customer.dashboard'); // Ganti dengan route yang sesuai untuk customer
            }
        }

        // Kembali jika login gagal
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }


    // Logout
    // public function logout()
    // {
    //     Auth::logout(); // Logout user
    //     return redirect()->route('login'); // Redirect ke halaman login setelah logout
    // }

    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session pengguna
        $request->session()->invalidate();

        // Regenerasi token CSRF untuk keamanan
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'Anda berhasil logout.'); // Redirect ke halaman login setelah logout
    }
}
