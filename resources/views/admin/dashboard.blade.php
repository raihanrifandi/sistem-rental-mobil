@extends('layouts.app')
@section('title', 'Dashboard')

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
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <th class="px-6 py-3 border">ID</th>
                        <th class="px-6 py-3 border">Nama Penyewa</th>
                        <th class="px-6 py-3 border">Mobil</th>
                        <th class="px-6 py-3 border">Tanggal Mulai</th>
                        <th class="px-6 py-3 border">Tanggal Selesai</th>
                        <th class="px-6 py-3 border">Waktu Penjemputan</th>
                        <th class="px-6 py-3 border">Total Biaya</th>
                        <th class="px-6 py-3 border">Status</th>
                        <th class="px-6 py-3 text-center border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penyewaan as $sewa)
                        <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 border">{{ $sewa->id_penyewaan }}</td>
                            <td class="px-6 py-4 border">{{ $sewa->penyewa }}</td>
                            <td class="px-6 py-4 border">
                                @php
                                    $mobil = json_decode($sewa->mobil, true);
                                @endphp
                                {{ $mobil['merk'] ?? 'N/A' }} 
                            </td>
                            <td class="px-6 py-4 border">{{ $sewa->tanggal_mulai }}</td>
                            <td class="px-6 py-4 border">{{ $sewa->tanggal_selesai }}</td>
                            <td class="px-6 py-4 border">{{ $sewa->waktu_penjemputan }}</td>
                            <td class="px-6 py-4 border">Rp {{ number_format($sewa->total_biaya, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 border">
                                <span
                                    class="px-3 py-1 text-sm font-medium rounded-full 
                                    {{ $sewa->status_penyewaan === 'on-going'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : ($sewa->status_penyewaan === 'completed'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($sewa->status_penyewaan) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center border">
                                <!-- Tombol Edit -->
                                <a href="{{ route('penyewaan.edit', $sewa->id_penyewaan) }}"
                                    class="px-4 py-1 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 focus:outline-none transition duration-200">
                                    Edit
                                </a>
                                <!-- Form Hapus -->
                                <form action="{{ route('penyewaan.destroy', $sewa->id_penyewaan) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus penyewaan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-1 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-200 focus:outline-none transition duration-200">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
