<?php

// namespace App\Http\Controllers;

// use App\Models\Penyewaan;
// use Illuminate\Http\Request;

// class SewaController extends Controller
// {   
//     public function index()
//     {   
//         $penyewaan = Penyewaan::table('sewa')->get(); 
//         return view('sewa-mobil', compact('sewa'));
//     }
    
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sewamobil;

class SewaController extends Controller
{
    public function create()
    {
        return view('sewa-mobil'); // Nama view form
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penyewa' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_hp' => 'required|string',
            'nama_mobil' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'durasi' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        Sewamobil::create($validated);

        return redirect()->route('sewamobil.create')->with('success', 'Data rental berhasil disimpan!');
    }
}
