<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $user = auth()->user();

        return view('user-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update nama dan email
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }


    public function adminHome()
    {
        $jumlahMobil = Product::count();
        $mobilTersewa = Product::jumlahTersewa();
        $mobilTersedia = Product::jumlahTersedia();

        $penyewaan = Penyewaan::all();


        return view('dashboard', compact('jumlahMobil', 'mobilTersewa', 'mobilTersedia', 'penyewaan'));
    }
}
