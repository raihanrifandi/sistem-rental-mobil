<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\MetodePembayaran;

use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Menampilkan daftar pembayaran
    public function index()
    {
        $pembayaranList = Pembayaran::select('pembayaran.*', 'penyewaan.id_penyewaan', 'penyewaan.total_biaya', 'metode_pembayaran.jenis_pembayaran')
            ->join('penyewaan', 'pembayaran.id_penyewaan', '=', 'penyewaan.id_penyewaan')
            ->join('metode_pembayaran', 'pembayaran.id_metode', '=', 'metode_pembayaran.id_metode')
            ->get();

        return view('admin.pembayaran', compact('pembayaranList'));
    }

    // Menampilkan detail pembayaran
    // public function show($id)
    // {
    //     $pembayaran = Pembayaran::select('pembayaran.*', 'penyewaan.*', 'metode_pembayaran.nama_metode')
    //         ->join('penyewaan', 'pembayaran.id_penyewaan', '=', 'penyewaan.id_penyewaan')
    //         ->join('metode_pembayaran', 'pembayaran.id_metode', '=', 'metode_pembayaran.id_metode')
    //         ->where('pembayaran.id_pembayaran', $id)
    //         ->first();

    //     return view('admin.detail-pembayaran', compact('pembayaran'));
    // }
}
