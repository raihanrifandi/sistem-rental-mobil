<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CarController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Product::query()
                ->where('status', 'available');

            // Apply search filter if present
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where('merk', 'like', "%{$search}%");
            }

            $cars = $query
                ->latest()
                ->paginate(10);

            // Append query parameters for pagination links
            $cars->appends($request->query());

            // Check if request is AJAX and return appropriate response
            if ($request->ajax()) {
                $view = view('components.car-grid', compact('cars'))->render();
                return response()->json([
                    'status' => 'success',
                    'html' => $view,
                    'count' => $cars->total(),
                ]);
            }

            // Render the view with the filtered cars
            return view('user.katalog-mobil', compact('cars'));
        } catch (Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ], 500);
             }
            return back()->with('error', 'Failed to load cars: ' . $e->getMessage());
        }
    }
}