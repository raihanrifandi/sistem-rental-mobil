<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;
use App\Models\Product;
use Midtrans\Snap;

class TransaksiController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman transaksi berdasarkan mobil_id.
     */
    public function index(Request $request)
    {
        // Ambil data mobil berdasarkan mobil_id dari request
        $mobil = Product::find($request->mobil_id);

        // Jika mobil tidak ditemukan atau status tidak 'available'
        if (!$mobil || $mobil->status !== 'available') {
            return redirect()->back()->with('error', 'Mobil tidak tersedia atau sedang disewa.');
        }

        // Kirim data mobil ke halaman transaksi
        return view('transaksi', compact('mobil'));

    }

    /**
     * Menyimpan data transaksi ke database.
     */
    public function store(Request $request)
    {
        // Validasi data input dari form transaksi
        $validatedData = $request->validate([
            'mobil_id' => 'required|exists:mobil,id_mobil', // Pastikan mobil_id ada di database
            'nama_penyewa' => 'required|string|max:255',
            'alamat_email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        ]);

        // Hitung durasi penyewaan (dalam hari)
        $tanggal_mulai = \Carbon\Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = \Carbon\Carbon::parse($request->tanggal_selesai);
        $durasi_hari = $tanggal_mulai->diffInDays($tanggal_selesai);

        // Ambil data mobil untuk menghitung total biaya
        $mobil = Product::find($request->mobil_id);
        $total_biaya = $durasi_hari * $mobil->harga_sewa;

        // Simpan transaksi sementara ke database
        $penyewaan = Penyewaan::create([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_biaya' => $total_biaya,
            'status_penyewaan' => 'pending',
            'id_mobil' => $mobil->id_mobil,
            'user_id' => auth()->user()->id,
        ]);

        // Update status mobil menjadi 'rented'
        $mobil->update(['status' => 'rented']);

        // Konfigurasi transaksi untuk Midtrans
        $params = array(
            'transaction_details' => array(
                'order_id' => 'ORDER-' . $penyewaan->id, 
                'gross_amount' => $total_biaya,
            ),
            'customer_details' => array(
                'first_name' => $request->nama_penyewa,
                'last_name' => $request->nama_penyewa,
                'email' => $request->alamat_email,
                'phone' => $request->nomor_telepon,
            ),
        );

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('transaksi', compact('snapToken', 'penyewaan', 'mobil', 'total_biaya'));
        } catch (\Exception $e) {
            // Hapus transaksi jika gagal membuat token
            $penyewaan->delete();
            return redirect()->route('transaksi')->with('error', 'Gagal memproses transaksi. Silakan coba lagi.');
        }
    }
}
