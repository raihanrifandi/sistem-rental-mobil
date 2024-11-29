@extends('layouts.app')
@section('title', 'Manajemen Penyewaan')

@section('contents')
    <div class="container mx-auto">
        <div id="toastContainer" class="fixed top-5 right-5 space-y-4 z-50"></div>

        @if (session('error'))
            <div class="alert alert-danger bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Manajemen Penyewaan</h1>
        </div>

        <!-- Tabel Penyewaan -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">ID</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Nama Penyewa</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Mobil</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Tanggal Mulai</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Tanggal Selesai</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Waktu Penjemputan</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Total Biaya</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Status</th>
                        <th class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($penyewaan as $sewa)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="py-4 px-4 border">{{ $sewa->id_penyewaan }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->penyewa }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->mobil }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->tanggal_mulai }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->tanggal_selesai }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->waktu_penjemputan}}</td>
                            <td class="py-4 px-4 border">Rp {{ number_format($sewa->total_biaya, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 border">
                                <span class="px-3 py-1 text-sm font-medium rounded-full 
                                    {{ $sewa->status_penyewaan === 'on-going' ? 'bg-yellow-100 text-yellow-700' : 
                                    ($sewa->status_penyewaan === 'completed' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                    {{ $sewa->status_penyewaan }}
                                </span>
                            </td>
                            <td class="py-4 px-4 border text-center">
                                <!-- Tombol Edit -->
                                <a href="{{ route('penyewaan.edit', $sewa->id_penyewaan) }}" 
                                   class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600 transition duration-200 shadow">
                                    Edit
                                </a>
                                <!-- Form Hapus -->
                                <form action="{{ route('penyewaan.destroy', $sewa->id_penyewaan) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penyewaan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600 transition duration-200 shadow">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
