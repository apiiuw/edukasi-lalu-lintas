<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GoogleAuthController extends Controller
{
    // Redirect ke Google untuk login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback setelah login Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Cek apakah user sudah ada
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Simpan email di session dan redirect ke halaman sign-up-google
                session(['google_email' => $googleUser->getEmail(), 'google_name' => $googleUser->getName()]);
                return redirect('/sign-up-google');
            }

            // Login user jika sudah ada
            Auth::login($user);

            return redirect('/')->with('success', 'Selamat datang');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login dengan Google');
        }
    }

    // Halaman sign-up-google untuk pengguna baru
    public function showGoogleSignUp()
    {
        return view('auth.sign-up-google', [
            'email' => session('google_email'),
            'name' => session('google_name'),
        ]);
    }

    // Proses pendaftaran setelah input password
    public function completeGoogleSignUp(Request $request)
    {
        // Ambil email dari session
        $email = session('google_email');
        $name = session('google_name');
    
        if (!$email) {
            return redirect('/login')->with('error', 'Session Google tidak ditemukan');
        }
    
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Buat user baru
        $user = User::create([
            'name' => $request->nama_lengkap ?? $name, // Nama bisa diedit jika belum ada
            'email' => $email,
            'password' => Hash::make($request->password),
            'role' => 'User',
        ]);
    
        // Hapus session Google setelah signup
        session()->forget(['google_email', 'google_name']);
    
        // Login user
        Auth::login($user);
    
        return redirect('/')->with('success', 'Selamat datang');
    }
}
