<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $metodePembayaran = MetodePembayaran::all();
        return view('metode_pembayaran', compact('metodePembayaran'));
    }

    public function create()
    {
        return view('create_metode_pembayaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pembayaran' => 'required|string|max:255',
        ]);

        MetodePembayaran::create($request->only('jenis_pembayaran'));

        return redirect()->to('metode_pembayaran')->with('success', 'Metode pembayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $metodePembayaran = MetodePembayaran::findOrFail($id);
        return view('edit_metode_pembayaran', compact('metodePembayaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_pembayaran' => 'required|string|max:255',
        ]);

        $metodePembayaran = MetodePembayaran::findOrFail($id);
        $metodePembayaran->update($request->only('jenis_pembayaran'));

        return redirect()->to('metode_pembayaran')->with('success', 'Metode pembayaran berhasil diupdate.');
    }

    public function destroy($id)
    {
        MetodePembayaran::findOrFail($id)->delete();
        return redirect()->to('metode_pembayaran')->with('success', 'Metode pembayaran berhasil dihapus.');
    }
}
