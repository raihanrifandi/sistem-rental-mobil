<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{

    public function index()
    {
        $penyewaan = Penyewaan::with('user')
            ->where('status_penyewaan', '!=', 'pending') // Filter status penyewaan
            ->get();

        return view('penyewaan', compact('penyewaan'));
    }

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

    public function update(Request $request, Penyewaan $penyewaan)
    {
        $request->validate([
            'status_penyewaan' => 'required|in:pending,on-going,completed,canceled',
        ]);

        $penyewaan->update([
            'status_penyewaan' => $request->status_penyewaan,
        ]);

        return redirect()->route('penyewaan.index')->with('success', 'Status penyewaan berhasil diperbarui.');
    }

    public function updateValidasi(Request $request, Penyewaan $penyewaan)
    {
        $request->validate([
            'validasi' => 'required|in:accept,reject',
        ]);

        if ($request->validasi === 'accept') {
            $penyewaan->status_penyewaan = 'on-going';
            $penyewaan->validasi = 'accept';
        } elseif ($request->validasi === 'reject') {
            $penyewaan->validasi = 'reject';
        }

        $penyewaan->save();

        return response()->json([
            'message' => 'Validasi berhasil diperbarui',
            'status_penyewaan' => $penyewaan->status_penyewaan,
            'validasi' => $penyewaan->validasi,
        ]);
    }


    public function validasiRequests()
    {
        $penyewaan = Penyewaan::with('user')
        ->orderByRaw('validasi IS NOT NULL')
        ->get();

        return view('validasi_penyewaan', compact('penyewaan'));
    }
}
