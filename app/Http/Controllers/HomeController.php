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
        return view('user.home');
    }

    public function adminHome()
    {
        $jumlahMobil = Product::count();
        $mobilTersewa = Product::jumlahTersewa();
        $mobilTersedia = Product::jumlahTersedia();

        $penyewaan = Penyewaan::all();


        return view('admin.dashboard', compact('jumlahMobil', 'mobilTersewa', 'mobilTersedia', 'penyewaan'));
    }
}
