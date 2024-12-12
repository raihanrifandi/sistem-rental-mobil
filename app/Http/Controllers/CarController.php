<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // Fetch hanya mobil yang tersedia
        $query = Product::where('status', 'available'); // Hanya mengambil mobil yang tersedia

        // Pencarian berdasarkan merk atau model
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('merk', 'like', '%' . $request->search . '%')
                  ->orWhere('model', 'like', '%' . $request->search . '%');
            });
        }

        // Filter berdasarkan merk
        if ($request->has('merk') && $request->merk) {
            $query->where('merk', $request->merk);
        }

        // Filter berdasarkan tahun
        if ($request->has('tahun') && $request->tahun) {
            $query->where('tahun', $request->tahun);
        }

        // Filter berdasarkan transmisi
        if ($request->has('transmisi') && $request->transmisi) {
            $query->where('transmisi', $request->transmisi);
        }

        // Filter berdasarkan kapasitas
        if ($request->has('kapasitas') && $request->kapasitas) {
            $query->where('kapasitas', $request->kapasitas);
        }

        // Dapatkan hasil dengan pagination
        $cars = $query->paginate(10);

        return view('user.katalog-mobil', compact('cars'));
    }
}
