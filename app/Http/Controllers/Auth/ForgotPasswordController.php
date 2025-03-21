<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Link reset password telah berhasil dikirim ke email Anda.');
        } else {
            return back()->withErrors(['email' => 'Email tidak ditemukan atau gagal mengirim link reset password.']);
        }
    }
    
}
