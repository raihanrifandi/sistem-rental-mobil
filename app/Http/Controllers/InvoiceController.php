<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class InvoiceController extends Controller
{
    public function show($encryptedId)
    {
        
        $id = Crypt::decryptString($encryptedId);
       
        // Ambil data penyewaan berdasarkan ID
        $penyewaan = Penyewaan::with(['user', 'mobil', 'pembayaran'])->findOrFail($id);
        
         // Hitung durasi sewa
         $tanggalMulai = Carbon::parse($penyewaan->tanggal_mulai);
         $tanggalSelesai = Carbon::parse($penyewaan->tanggal_selesai);
         $durasiSewa = $tanggalMulai->diffInDays($tanggalSelesai); 

        // Tambahkan 7 jam ke waktu pembayaran
        $tanggalPembayaranPlus7 = null;
        if ($penyewaan->pembayaran && $penyewaan->pembayaran->tanggal_pembayaran) {
            $tanggalPembayaranPlus7 = Carbon::parse($penyewaan->pembayaran->tanggal_pembayaran)->addHours(7);
        }

        // Kirim data ke view
        return view('user.invoice', [
            'penyewaan' => $penyewaan,
            'user' => $penyewaan->user,
            'mobil' => $penyewaan->mobil,
            'pembayaran' => $penyewaan->pembayaran,
            'durasiSewa' => $durasiSewa,
            'tanggalPembayaranPlus7' => $tanggalPembayaranPlus7,
        ]);
    }
}
