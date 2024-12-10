@extends('layouts.user')
@section('title', 'Transaksi Berhasil')

@section('contents')
<div class="container mx-auto px-4 py-28"> 
    <div class="bg-white shadow-lg rounded-lg p-8 text-center max-w-md mx-auto"> 
        {{-- Tambahkan ikon sukses --}}
        <div class="flex justify-center mb-4">
            <div class="rounded-full bg-green-200 p-6">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-500 p-4">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>
                </div>
            </div>
        </div>
        <h1 class="text-2xl font-bold text-green-600 mb-4">Penyewaan Berhasil!</h1>
        <p class="text-gray-700">Permintaan penyewaan lepas kunci Anda sedang direview oleh tim kami.</p>
        <p class="text-gray-500 mt-2">Silakan tunggu selama <span class="font-semibold">1 x 60 menit</span>.</p><br>
        <div class="mt-6">
            <a href="/" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded shadow">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection