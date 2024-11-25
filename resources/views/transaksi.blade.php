@extends('layouts.user')
@section('title', 'Transaksi')

@section('contents')
<div class="max-w-6xl mx-auto px-4">
    <div class="flex items-center gap-2 mb-8">
        <a href="{{ url()->previous() }}" class="text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-xl font-medium">Transaksi</h1>
    </div>

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-4">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl mb-4">
        {{ session('success') }}
    </div>
    @endif
    
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Left Side - Form -->
        <div class="w-full md:w-2/3">
            <div class="flex justify-between items-center mb-6">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white">
                    <span>1</span>
                </div>
                <div class="w-8 h-8 border-2 rounded-full flex items-center justify-center">
                    <span>2</span>
                </div>
                <div class="w-8 h-8 border-2 rounded-full flex items-center justify-center">
                    <span>3</span>
                </div>
            </div>

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="mobil_id" value="{{ $mobil->id_mobil }}">

                <div class="bg-white rounded-[6px] p-6 mb-6 border border-gray-200">
                    <h2 class="text-lg font-medium mb-4">Informasi Penyewa</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm text-gray-600 mb-2">Nama Lengkap Sesuai KTP/Paspor/SIM</label>
                            <input type="text" name="nama_penyewa" class="w-[456px] p-2 border rounded-[6px] focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-2">Alamat Email</label>
                            <input type="email" name="alamat_email" class="w-[456px] p-2 border rounded-[6px] focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-2">Nomor Ponsel</label>
                            <input type="tel" name="nomor_telepon" class="w-[456px] p-2 border rounded-[6px] focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_mulai" class="block text-sm text-gray-600 mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="w-[456px] p-2 border rounded-[6px] focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_selesai" class="block text-sm text-gray-600 mb-2">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="w-[456px] p-2 border rounded-[6px] focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[6px] p-6 mb-6 border border-gray-200">
                    <h2 class="text-lg font-medium mb-4">Metode Pembayaran</h2>
                    <div class="border rounded-[6px] p-4">
                        <p class="text-sm font-medium mb-2">Payment Method</p>
                        <div id="snap-container">
                            {{-- Snap dari midtrans --}}
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[6px] p-6 mb-6 border border-gray-200">
                    <h2 class="text-lg font-medium mb-4">Persetujuan & Kebijakan</h2>
                    <div class="text-sm text-gray-600">
                        <p class="mb-4">Please review the order details and payment details before proceeding to confirm your order</p>
                        <div class="flex items-start gap-2">
                            <input type="checkbox" id="agreementCheckbox" required class="mt-1">
                            <p>I agree to the 
                                <a href="#" class="text-blue-500">Terms & conditions</a>, 
                                <a href="#" class="text-blue-500">Privacy policy</a> & 
                                <a href="#" class="text-blue-500">Return policy</a>
                            </p>
                        </div>
                    </div>
                </div>

                <button type="submit" 
                        id="paymentButton"
                        disabled
                        class="w-full py-4 rounded-2xl font-medium text-white button-disabled transition-all duration-300">
                    Bayar Sekarang
                </button>
            </form>
            <br><br>
        </div>

        <!-- Right Side - Order Summary -->
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-[6px] p-6 border border-gray-200 sticky top-4">
                <div class="flex items-center gap-4 mb-6">
                    @if($mobil->gambar)
                        <img src="{{ asset($mobil->gambar) }}" alt="{{ $mobil->merk }}" class="w-24 h-24 object-cover rounded-2xl">
                    @else
                        <div class="w-24 h-24 bg-gray-100 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <div>
                        <h3 class="font-medium">{{ $mobil->merk }} {{ $mobil->model }}</h3>
                        <p class="text-lg font-bold">Rp{{ number_format($mobil->harga_sewa, 2) }}</p>
                        <a href="#" class="text-blue-500 text-sm">Edit durasi sewa</a>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span>Kode Promo</span>
                        <a href="#" class="text-blue-500">Masukkan Kode</a>
                    </div>
                    <input type="text" placeholder="Masukkan kode promo" class="w-full p-3 border rounded-[6px] focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="border-t pt-4">
                    <h4 class="font-medium mb-4">Detail Pembayaran</h4>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span>Sub Total</span>
                            <span>Rp{{ number_format($mobil->harga_sewa, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Pajak</span>
                            <span>Rp{{ number_format($mobil->harga_sewa * 0.1, 2) }}</span>
                        </div>
                        <div class="flex justify-between font-bold pt-2 border-t">
                            <span>Total</span>
                            <span>Rp{{ number_format($mobil->harga_sewa * 1.1, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.konfirmasi')
<!-- Midtrans Snap JS -->
{{-- <script type="text/javascript" 
src="https://app.stg.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script> 
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        event.preventDefault();
        
        // Call Snap Midtrans popup
        window.snap.pay('gagal', {
            onSuccess: function (result) {
                alert("Pembayaran berhasil!"); 
                console.log(result);
                window.location.href = '/';
            },
            onPending: function (result) {
                alert("Menunggu pembayaran!"); 
                console.log(result);
            },
            onError: function (result) {
                alert("Pembayaran gagal!"); 
                console.log(result);
            },
            onClose: function () {
                alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
            }
        });
    });
    //   window.snap.embed('snapToken', {
    //     embedId: 'snap-container',
</script> --}}
@endsection