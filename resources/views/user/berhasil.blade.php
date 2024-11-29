@extends('layouts.user')
@section('title', 'Transaksi Berhasil')

@section('contents')
<div class="container mx-auto px-4 py-8"> 
    <div class="bg-white shadow-lg rounded-lg p-8 text-center max-w-md mx-auto"> 
        {{-- Tambahkan ikon sukses --}}
        <div class="flex justify-center mb-4">
            <img src="../assets/img/successIcon.png" alt="Success Icon" class="w-20 h-20">
        </div>
        <h1 class="text-2xl font-bold text-green-600 mb-4">Penyewaan Berhasil!</h1>
        <p class="text-gray-700">Permintaan penyewaan lepas kunci Anda sedang direview oleh tim kami.</p>
        <p class="text-gray-500 mt-2">Silakan tunggu selama <span class="font-semibold">1 x 60 menit</span>.</p>
        <div class="mt-6">
            <a href="/" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded shadow">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection