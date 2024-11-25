@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('contents')
    <div>
        <h1 class="font-bold text-2xl ml-3">
            Dashboard
        </h1>

        <div class="grid grid-cols-3 gap-4 mt-5 ml-3 mr-3">

            <div class="bg-gradient-to-r from-green-500 to-white p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-white">Jumlah Produk</h2>
                <p class="text-2xl font-bold text-white">{{ $jumlahMobil }}</p>
            </div>

            <div class="bg-gradient-to-r from-blue-500 to-white p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-white">Produk Tersewa</h2>
                <p class="text-2xl font-bold text-white">{{ $mobilTersewa }}</p>
            </div>

            <div class="bg-gradient-to-r from-purple-500 to-white p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-white">Produk Tersedia</h2>
                <p class="text-2xl font-bold text-white">{{ $mobilTersedia }}</p>
            </div>
        </div>

        <div class="mt-8 ml-3 mr-3">
            <h2 class="text-xl font-semibold text-gray-700">Data Penyewaan</h2>
            <div class="overflow-x-auto">
                <!-- Flowbite Table -->
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border">ID Penyewaan</th>
                            <th class="px-6 py-3 border">Tanggal Mulai</th>
                            <th class="px-6 py-3 border">Tanggal Selesai</th>
                            <th class="px-6 py-3 border">Total Biaya</th>
                            <th class="px-6 py-3 border">Status Penyewaan</th>
                            <th class="px-6 py-3 border">ID Mobil</th>
                            <th class="px-6 py-3 border">ID Pengguna</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyewaan as $sewa)
                            <tr class="border-t">
                                <td class="px-6 py-4 border">{{ $sewa->id_penyewaan }}</td>
                                <td class="px-6 py-4 border">{{ $sewa->tanggal_mulai }}</td>
                                <td class="px-6 py-4 border">{{ $sewa->tanggal_selesai }}</td>
                                <td class="px-6 py-4 border">{{ $sewa->total_biaya }}</td>
                                <td class="px-6 py-4 border">{{ $sewa->status_penyewaan }}</td>
                                <td class="px-6 py-4 border">{{ $sewa->id_mobil }}</td>
                                <td class="px-6 py-4 border">{{ $sewa->id_pengguna }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
