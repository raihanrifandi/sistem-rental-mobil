<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Penyewaan;
use App\Models\Product;
use App\Models\User;
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
        // Ambil data penyewa berdasarkan id dari session yang sedang aktif
        $mobil = Product::find($request->mobil_id);
        $user = User::find(auth()->user()->id);

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
        return view('user.transaksi', compact('mobil', 'user', 'snapToken'));
        // return view('transaksi', compact('mobil', 'user', 'snapToken'));

    }

    /**
     * Menyimpan data transaksi ke database.
     */
    public function store(Request $request)
    {   
        // Validasi data input dari form transaksi
        $request->validate([
            'mobil_id' => 'required|exists:mobil,id_mobil',
            'nama_penyewa' => 'required|string|max:255',
            'alamat_email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'waktu_penjemputan' => 'required|date_format:H:i',
            'dokumen_wajib' => 'required|file|mimes:jpg,jpeg,png|max:1024'
        ]);

        $filePath = $request->file('dokumen_wajib')->store('public/identitas');

        $userId = auth()->user()->id; 
        $user = User::find($userId); 
        $user->update([
            'no_telepon' => $request->nomor_telepon,
        ]);

        // Pastikan waktu selalu memiliki format HH:MM:SS
        $waktuPenjemputan = $request->waktu_penjemputan . ':00';

        // Hitung durasi penyewaan (dalam hari)
        $tanggal_mulai = \Carbon\Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = \Carbon\Carbon::parse($request->tanggal_selesai);
        $durasi_hari = $tanggal_mulai->diffInDays($tanggal_selesai);

        // Ambil data mobil untuk menghitung total biaya beserta pajaknya
        $mobil = Product::find($request->mobil_id);
        $pajak = $mobil->harga_sewa * 0.1;
        $subtotal_biaya = $durasi_hari * $mobil->harga_sewa;
        $total_biaya =  $subtotal_biaya + $pajak;

        // Simpan transaksi sementara ke database
        Penyewaan::create([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'waktu_penjemputan' => $waktuPenjemputan,
            'total_biaya' => $total_biaya,
            'status_penyewaan' => 'pending',
            'id_mobil' => $mobil->id_mobil,
            'user_id' => auth()->user()->id,
            'kartu_identitas' => $filePath,
        ]);

        $mobil->update(['status' => 'rented']);

        $token = Str::uuid();
        return redirect()->route('berhasil', ['token' => $token]);
    }
}
