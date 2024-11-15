<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Product::where('status', 'available')->get(); // Only fetch available cars
        return view('list-mobil', compact('cars'));
    }

    public function filter(Request $request)
    {
        $query = Product::query();


        // Filter by search (optional)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('merk', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%");
            });
        }

        // Filter by model (optional, multiple selection possible)
        if ($request->filled('model') && !empty($request->model)) {
            $query->whereIn('model', (array)$request->model);
        }

        // Filter by transmisi (optional, multiple selection possible)
        if ($request->filled('transmisi') && !empty($request->transmisi)) {
            $query->whereIn('transmisi', (array)$request->transmisi);
        }

        // Filter by kapasitas (optional)
        if ($request->filled('kapasitas') && $request->kapasitas !== '') {
            $query->where('kapasitas', $request->kapasitas);
        }

        // Filter by price range (optional, both min and max are independent)
        if ($request->filled('min_harga') && is_numeric($request->min_harga)) {
            $query->where('harga', '>=', $request->min_harga);
        }

        if ($request->filled('max_harga') && is_numeric($request->max_harga)) {
            $query->where('harga', '<=', $request->max_harga);
        }

        // Get the filtered results
        $cars = $query->get();

        if ($request->ajax()) {
            $view = view('components.car-grid', compact('cars'))->render();
            return response()->json([
                'status' => 'success',
                'html' => $view,
                'count' => $cars->count(),
                'filters_applied' => [
                    'search' => $request->search ?? null,
                    'model' => $request->model ?? [],
                    'transmisi' => $request->transmisi ?? [],
                    'kapasitas' => $request->kapasitas ?? null,
                    'min_harga' => $request->min_harga ?? null,
                    'max_harga' => $request->max_harga ?? null,
                ]
            ]);
        }

        return view('list-mobil', compact('cars'));
    }
}
