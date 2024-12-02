@extends('layouts.user')

@section('title', 'Riwayat Transaksi')

@section('contents')
    <div class="container mx-auto px-4">
        @if (session('error'))
            <div class="alert alert-danger bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Riwayat Transaksi</h1>
        </div>

        <!-- Grid untuk Riwayat Penyewaan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($transactions as $transaction)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 max-w-xs mx-auto">
                    <!-- Gambar Mobil -->
                    <img src="{{ asset($transaction->mobil->gambar) }}" class="w-full h-48 object-cover object-center">

                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $transaction->mobil->merk }} {{ $transaction->mobil->model }}</h2>
                        <p class="text-gray-600">Tahun: {{ $transaction->mobil->tahun }}</p>
                        <p class="text-gray-600">Plat: {{ $transaction->mobil->plat }}</p>
                        <p class="text-gray-600">Harga Sewa: <span class="font-bold text-green-600">Rp {{ number_format($transaction->mobil->harga_sewa, 0, ',', '.') }}</span></p>
                        <p class="text-gray-600">Kapasitas: {{ $transaction->mobil->kapasitas }} orang</p>
                        <p class="text-gray-600">ID Penyewaan: {{ $transaction->id_penyewaan }}</p>
                    </div>

                    <div class="p-4 border-t">
                        <div class="flex justify-between items-center">
                            @if ($transaction->status_penyewaan == 'confirmed')
                                <a href="{{ route('transaksi.showPaymentDetail', Crypt::encryptString($transaction->id_penyewaan)) }}" 
                                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200">
                                    Bayar Sekarang
                                </a>
                            @elseif ($transaction->status_penyewaan == 'pending')
                                <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Under Review</span>
                            @elseif ($transaction->status_penyewaan == 'on-going')
                                <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">Sedang Berjalan</span>
                                <a href="{{ route('invoice.show', Crypt::encryptString($transaction->id_penyewaan)) }}" 
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                                    Lihat Invoice
                                </a>
                            @elseif ($transaction->status_penyewaan == 'completed')
                                <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Selesai</span>
                                <a href="{{ route('invoice.show', Crypt::encryptString($transaction->id_penyewaan)) }}" 
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                                    Lihat Invoice
                                </a>
                            @elseif ($transaction->status_penyewaan == 'canceled')
                                <span class="bg-red-200 text-red-800 px-3 py-1 rounded-full text-sm font-medium">Dibatalkan</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

