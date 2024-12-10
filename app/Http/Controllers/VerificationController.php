<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function notice()
    {
        // Pastikan pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user(); // Mengambil pengguna yang terotentikasi
            return view('auth.verify-email', ['email' => $user->email]);
        }

        // Jika pengguna tidak login, redirect ke halaman login
        return redirect()->route('login');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return redirect()->route('home');
    }

    public function resend(Request $request)
    {
        // Pastikan pengguna sudah login
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Verification link has been resent.');
    }
}