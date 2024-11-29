@extends('layouts.app')
@section('title', 'Manajemen Waiting List')

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
            <h1 class="text-3xl font-semibold text-gray-800">Manajemen Waiting List</h1>
        </div>

        <!-- Tabel Waiting List -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">ID</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Nama Penyewa</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">No Telepon</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Email</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Mobil</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Lama Sewa</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Total Biaya</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Status</th>
                        <th class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($waitingList as $sewa)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="py-4 px-4 border">{{ $sewa->id_penyewaan }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->penyewa }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->no_telepon }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->email }}</td>
                            <td class="py-4 px-4 border">{{ $sewa->mobil }}</td>
                            <td class="py-4 px-4 border">
                                {{ \Carbon\Carbon::parse($sewa->tanggal_mulai)->diffInDays($sewa->tanggal_selesai) }} hari
                            </td>
                            <td class="py-4 px-4 border">Rp {{ number_format($sewa->total_biaya, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 border">
                                @if ($sewa->status_penyewaan === 'pending')
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
                                        Menunggu Konfirmasi
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">
                                        {{ ucfirst($sewa->status_penyewaan) }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 border text-center">
                                <!-- Tombol Verifikasi -->
                                <form action="{{ route('permintaan.verify', $sewa->id_penyewaan) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-full hover:bg-green-600 transition duration-200 shadow mx-1">
                                        <i class="fas fa-check"></i>
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
