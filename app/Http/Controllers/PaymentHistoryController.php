<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penyewaan;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        // Ambil riwayat transaksi untuk user yang sedang login
        $userId = Auth::id();
        
        // Mengambil data penyewaan berdasarkan status
        $transactions = Penyewaan::with('mobil') // Mengambil relasi mobil
            ->where('user_id', $userId) // Filter berdasarkan user yang sedang login
            ->whereIn('status_penyewaan', ['completed', 'canceled', 'on-going', 'confirmed', 'pending']) // Status transaksi
            ->get();
        
        return view('user.riwayat-transaksi', compact('transactions'));
    }

    public function showPaymentDetail($encryptedId)
    {
        try {
            // Dekripsi id_penyewaan
            $id = Crypt::decryptString($encryptedId);

            // Cari data pembayaran berdasarkan id_penyewaan
            $payment = Pembayaran::with('penyewaan.mobil')
                ->where('id_penyewaan', $id)
                ->firstOrFail(); // Ambil data pertama atau lempar 404 jika tidak ditemukan

            // Validasi status penyewaan terkait pembayaran
            if ($payment->penyewaan->status_penyewaan !== 'confirmed') {
                return redirect()->route('user.riwayat-transaksi')
                    ->with('error', 'Transaksi belum dikonfirmasi atau sudah kadaluarsa.');
            }

            // Validasi token pembayaran (kadaluarsa)
            if (Carbon::now()->greaterThan($payment->token_expiration)) {
                return redirect()->route('user.riwayat-transaksi')
                    ->with('error', 'Token pembayaran telah kadaluarsa.');
            }

            // Kirim data ke view
            return view('user.detail-pembayaran', [
                'transaction' => $payment, // Data pembayaran
                'snapToken' => $payment->snap_token, // Ambil snap_token dari tabel pembayaran
            ]);
        } catch (\Exception $e) {
            // Jika dekripsi gagal atau data tidak ditemukan
            return redirect()->route('user.riwayat-transaksi')
                ->with('error', 'Terjadi kesalahan pada transaksi.');
        }
    }

    public function handleNotification(Request $request)
    {
        // Ambil data dari webhook
        $serverKey = env('MIDTRANS_SERVER_KEY'); 
        $notification = json_decode($request->getContent(), true);

        // Validasi signature key untuk keamanan
        $orderId = $notification['order_id'];
        $transactionStatus = $notification['transaction_status'];

        // Temukan data pembayaran berdasarkan order_id
        $payment = Pembayaran::with('penyewaan')
        ->where('id_penyewaan', $orderId)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Update status berdasarkan status pembayaran dari Midtrans
        if ($transactionStatus == 'settlement') {
            // Pembayaran berhasil
            $payment->update([
                'status_pembayaran' => 'lunas'
            ]);

            // Update status penyewaan ke 'ongoing' atau status lain sesuai kebutuhan
            $payment->penyewaan->update([
                'status_penyewaan' => 'on-going'
            ]);
        } elseif ($transactionStatus == 'pending') {
            // Pembayaran tertunda
            $payment->update([
                'status_pembayaran' => 'pending'
            ]);
        } elseif ($transactionStatus == 'deny' || $transactionStatus == 'cancel' || $transactionStatus == 'expire') {
            // Pembayaran ditolak, dibatalkan, atau kedaluwarsa
            $payment->update([
                'status_pembayaran' => 'canceled'
            ]);

            $payment->penyewaan->update([
                'status_penyewaan' => 'canceled'
            ]);
        }

        return response()->json(['message' => 'Notification processed successfully'], 200);
    }

}
