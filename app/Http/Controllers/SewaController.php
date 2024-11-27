<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sewamobil;

class SewaController extends Controller
{
    public function create()
    {
        // Menampilkan form sewa mobil
        return view('sewa-mobil'); // Pastikan view ini ada di folder resources/views
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_penyewa' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_hp' => 'required|string|max:15', // Batas nomor HP
            'nama_mobil' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai', // Validasi tanggal selesai
            'durasi' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        // Simpan data ke dalam tabel Sewamobil
        Sewamobil::create($validated);

        // Redirect ke halaman tertentu dengan pesan keberhasilan
        return redirect()->route('sewa-mobil.create')->with('success', 'Data rental berhasil disimpan!');
    }
}
