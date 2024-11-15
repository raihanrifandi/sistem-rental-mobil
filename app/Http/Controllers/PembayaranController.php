<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\MetodePembayaran;

use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Method to show the list of payments
    public function index()
    {
        $pembayarans = Pembayaran::all();  // Get all the pembayaran records
        return view('pembayaran', compact('pembayarans'));  // Pass data to the view
    }

    // Method to show the form to create a new pembayaran
    public function create()
    {
        $penyewaans = Penyewaan::all(); // Fetch penyewaan data
        $metodePembayarans = MetodePembayaran::all(); // Fetch metode pembayaran data
    
        return view('create_pembayaran', compact('penyewaans', 'metodePembayarans'));
    }

    // Method to store a new pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|integer',
            'tanggal_pembayaran' => 'required|date',
            'id_penyewaan' => 'required|exists:penyewaan,id_penyewaan',
            'id_metode' => 'required|exists:metode_pembayaran,id_metode',
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran')->with('success', 'Pembayaran successfully added.');
    }
}
