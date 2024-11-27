<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    // Display a listing of penyewaan
    public function index()
    {
        $penyewaan = Penyewaan::with('user')->get();
        return view('penyewaan', compact('penyewaan'));
    }

    // Show the form for creating new penyewaan
    public function create()
    {
        return view('create_penyewaan');
    }

    // Store a newly created penyewaan in storage
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'total_biaya' => 'required|integer',
            'status_penyewaan' => 'required|in:pending,on-going,completed,canceled',
            'id_mobil' => 'required|exists:mobil,id_mobil',
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
        ]);

        Penyewaan::create($request->all());

        return redirect()->route('penyewaan')->with('success', 'Penyewaan created successfully.');
    }

    // Show the form for editing an existing penyewaan
    public function edit(Penyewaan $penyewaan)
    {
        return view('edit_penyewaan', compact('penyewaan'));
    }

    // Update a penyewaan in storage
    public function update(Request $request, Penyewaan $penyewaan)
    {
        // Validasi request
        $request->validate([
            'status_penyewaan' => 'required|in:pending,on-going,completed,canceled',
        ]);

        // Update status penyewaan
        $penyewaan->update([
            'status_penyewaan' => $request->status_penyewaan,
        ]);

        // Redirect setelah berhasil update
        return redirect()->route('penyewaan.index')->with('success', 'Status penyewaan berhasil diperbarui.');
    }

    public function updateValidasi(Request $request, Penyewaan $penyewaan)
    {
        $request->validate([
            'validasi' => 'required|in:accept,reject',
        ]);

        // Update validasi penyewaan
        $penyewaan->validasi = $request->validasi;
        $penyewaan->save();

        return response()->json(['message' => 'Validasi berhasil diperbarui']);
    }

    // Remove the specified penyewaan from storage
    public function destroy(Penyewaan $penyewaan)
    {
        $penyewaan->delete();

        return redirect()->route('penyewaan')->with('success', 'Penyewaan deleted successfully.');
    }
}
