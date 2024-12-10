<?php

namespace App\Http\Controllers;
use App\Models\Penyewaan;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Midtrans\Snap;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
        $waitingList = Penyewaan::select(
                'penyewaan.*', 
                'users.name as penyewa', 
                'users.no_telepon', 
                'users.email', 
                'mobil.merk as mobil'
            )
            ->join('users', 'penyewaan.user_id', '=', 'users.id')
            ->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
            ->whereIn('penyewaan.status_penyewaan', ['pending'])
            ->get();

        return view('admin.permintaan-penyewaan', compact('waitingList'));
    }

    public function verifikasi($id)
    {
        // Mencari penyewaan berdasarkan ID
        $penyewaan = Penyewaan::findOrFail($id);

        if ($penyewaan->status_penyewaan === 'pending') {
            // Update status penyewaan menjadi on-going
            $penyewaan->status_penyewaan = 'confirmed';
            $penyewaan->save();
            // Membuat parameter untuk Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $penyewaan->id_penyewaan, // ID unik untuk pembayaran
                    'gross_amount' => $penyewaan->total_biaya, // Total biaya penyewaan
                ],
                'customer_details' => [
                    'first_name' => $penyewaan->user->name,
                    'last_name' => '', 
                    'email' => $penyewaan->user->email,
                    'phone' => $penyewaan->user->no_telepon,
                ],
                'expiry' => [
                    'start_time' => Carbon::now()->format('Y-m-d H:i:s T'), // Waktu mulai
                    'unit' => 'hour', // Satuan waktu
                    'duration' => 1, // Durasi kadaluarsa (1 jam)
                ],
            ];

            // Generate Snap Token
            $snapToken = Snap::getSnapToken($params);
            // Membuat entry baru di tabel pembayaran
            Pembayaran::create([
                'jumlah' => $penyewaan->total_biaya, // Jumlah pembayaran
                'tanggal_pembayaran' => Carbon::now(), // Tanggal pembayaran
                'id_penyewaan' => $penyewaan->id_penyewaan, // Relasi ke tabel penyewaan
                'id_metode' => 1, // Misalnya, metode pembayaran default
                'status_pembayaran' => 'pending', // Status awal
                'snap_token' => $snapToken, // Menyimpan token Midtrans
                'token_expiration' => Carbon::now()->addHour(), // Batas waktu pembayaran
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.permintaan')->with('success', 'Penyewaan berhasil diverifikasi dan pembayaran dibuat!');
        }

        // Jika status bukan 'pending', kirim pesan error
        return redirect()->route('admin.permintaan')->with('error', 'Status penyewaan tidak dapat diverifikasi!');
    }

    public function reject($id)
    {
        // Cari permintaan berdasarkan ID
        $request = Penyewaan::findOrFail($id);

        // Ubah status menjadi "rejected"
        $request->status_penyewaan = 'rejected';
        $request->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.permintaan')->with('success', 'Permintaan berhasil ditolak.');
    }

}
