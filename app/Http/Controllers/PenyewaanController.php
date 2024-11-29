<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;
class PenyewaanController extends Controller
{
    public function index()
    {
        $penyewaan = Penyewaan::select('penyewaan.*', 'users.name as penyewa', 'mobil.merk as mobil')
            ->join('users', 'penyewaan.user_id', '=', 'users.id')
            ->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
            ->whereIn('penyewaan.status_penyewaan', ['on-going', 'confirmed', 'completed', 'canceled'])
            ->get();

        return view('admin.riwayat-penyewaan', compact('penyewaan'));
    }

    public function destroy($id)
    {
        $penyewaan = Penyewaan::findOrFail($id);
        $penyewaan->delete();

        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil dihapus.');
    }
}
