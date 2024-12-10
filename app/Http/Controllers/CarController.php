<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // Fetch hanya mobil yang tersedia dengan pagination
        $query = Product::where('status', 'available');  // Hanya mengambil mobil yang tersedia
    
        // Pencarian berdasarkan merk atau model
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('merk', 'like', '%' . $request->search . '%')
                  ->orWhere('model', 'like', '%' . $request->search . '%');
            });
        }
    
        // Dapatkan hasil dengan pagination
        $cars = $query->paginate(10);
    
        return view('user.katalog-mobil', compact('cars'));
    }
    
}
