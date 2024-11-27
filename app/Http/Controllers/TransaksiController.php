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

        $params = array(
            'transaction_details' => array(
                'order_id' => 'ORDER-123', 
                'gross_amount' => 2000000,
            ),
            'customer_details' => array(
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '081234567890',
            ),
        );
    
        $snapToken = Snap::getSnapToken($params);

        return view('transaksi', compact('mobil', 'snapToken'));

    }

    /**
     * Menyimpan data transaksi ke database.
     */
    public function store(Request $request)
    {
        // Validasi data input dari form transaksi
        $validatedData = $request->validate([
            'mobil_id' => 'required|exists:product,id_mobil',
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
    }
}