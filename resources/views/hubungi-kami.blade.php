@extends('layouts.user')
@section('title', 'TentangKami')

@section('contents')
<div class="container mx-auto px-6 py-16">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-black">Hubungi Kami</h1>
            <p class="text-gray-600">Silakan hubungi kami untuk pertanyaan atau informasi lebih lanjut.</p>
        </div>

        <!-- Konten -->
        <div class="flex flex-col lg:flex-row items-center gap-10">
            <!-- Informasi Kontak -->
            <div class="bg-white p-6 rounded-lg shadow-md w-full lg:w-1/2">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Informasi Kontak</h2>
                <ul class="space-y-4">
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-gray-600 mr-2"></i>
                        <span class="text-gray-700">Email: rentalyukk@gmail.com</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fab fa-whatsapp text-green-500 mr-2"></i>
                        <span class="text-gray-700">Nomor WA: 085876879898</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                        <span class="text-gray-700">Alamat: Jalan Gajah Mada No.20</span>
                    </li>
                </ul>
            </div>

            <!-- Form Pertanyaan -->
            <div class="bg-white p-6 rounded-lg shadow-md w-full lg:w-1/2">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Ada Pertanyaan?</h2>
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nama <span class="text-red-500">*</span></label>
                        <input type="text" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nama Anda">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Email Anda">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700">Pesan <span class="text-red-500">*</span></label>
                        <textarea id="message" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Pesan Anda"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    @endsection