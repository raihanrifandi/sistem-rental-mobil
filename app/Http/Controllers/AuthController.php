<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memastikan hanya tamu yang dapat mengakses metode tertentu
        $this->middleware('guest')->except('logout');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        // Validasi data input
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => $this->passwordRules(),
            'g-recaptcha-response'=>'recaptcha',
        ])->validate();

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => '0', // Default user type
        ]);

        auth()->login($user);

         // Kirim email verifikasi
        $user->sendEmailVerificationNotification();

        return redirect()->route('verification.notice');
    }


    public function login()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        // Validasi input login
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        // Percobaan login
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        if (is_null(auth()->user()->email_verified_at)) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'You need to verify your email address before logging in.');
        }

        $request->session()->regenerate();

        // Redirect berdasarkan tipe user
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.home');
        }

        return redirect()->route('home');

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    protected function passwordRules()
    {
        return [
            'required',            // Wajib diisi
            'string',              // Harus berupa string
            'min:8',               // Panjang minimum 8 karakter
            'regex:/[a-z]/',       // Harus mengandung huruf kecil
            'regex:/[A-Z]/',       // Harus mengandung huruf besar
            'regex:/[0-9]/',       // Harus mengandung angka
            'confirmed',           // Harus ada konfirmasi password
        ];
    }
}
