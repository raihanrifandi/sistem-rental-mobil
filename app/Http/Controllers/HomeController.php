<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function adminHome()
    {
        $jumlahMobil = Product::count();
        $mobilTersewa = Product::jumlahTersewa();
        $mobilTersedia = Product::jumlahTersedia();

        $penyewaan = Penyewaan::all();


        return view('dashboard', compact('jumlahMobil', 'mobilTersewa', 'mobilTersedia', 'penyewaan'));
    }
}
