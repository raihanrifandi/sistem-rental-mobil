@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">
        Dashboard
    </h1>
    
    <div class="grid grid-cols-3 gap-4 mt-5 ml-3 mr-3">
        
        <div class="bg-gray-100 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-700">Jumlah Produk</h2>
            <p class="text-2xl font-bold text-gray-800">{{ $jumlahMobil }}</p>
        </div>

        <div class="bg-gray-200 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-700">Produk Tersewa</h2>
            <p class="text-2xl font-bold text-gray-800">{{ $mobilTersewa }}</p>
        </div>

        
        <div class="bg-gray-300 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-700">Produk Tersedia</h2>
            <p class="text-2xl font-bold text-gray-800">{{$mobilTersedia}}</p>
        </div>
    </div>

    <div class="mt-8 ml-3 mr-3">
        <h2 class="text-xl font-semibold text-gray-700">Data Penyewaan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 mt-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">ID Penyewaan</th>
                        <th class="px-4 py-2 border">Tanggal Mulai</th>
                        <th class="px-4 py-2 border">Tanggal Selesai</th>
                        <th class="px-4 py-2 border">Total Biaya</th>
                        <th class="px-4 py-2 border">Status Penyewaan</th>
                        <th class="px-4 py-2 border">ID Mobil</th>
                        <th class="px-4 py-2 border">ID Pengguna</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penyewaan as $sewa)
                    <tr class="border-t">
                        <td class="px-4 py-2 border">{{ $sewa->id_penyewaan }}</td>
                        <td class="px-4 py-2 border">{{ $sewa->tanggal_mulai }}</td>
                        <td class="px-4 py-2 border">{{ $sewa->tanggal_selesai }}</td>
                        <td class="px-4 py-2 border">{{ $sewa->total_biaya }}</td>
                        <td class="px-4 py-2 border">{{ $sewa->status_penyewaan }}</td>
                        <td class="px-4 py-2 border">{{ $sewa->id_mobil }}</td>
                        <td class="px-4 py-2 border">{{ $sewa->id_pengguna }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection