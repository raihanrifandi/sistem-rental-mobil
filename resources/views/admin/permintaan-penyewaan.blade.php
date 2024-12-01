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
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-500 border">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 border">ID</th>
                            <th class="py-3 px-4 border">Nama Penyewa</th>
                            <th class="py-3 px-4 border">No Telepon</th>
                            <th class="py-3 px-4 border">Email</th>
                            <th class="py-3 px-4 border">Mobil</th>
                            <th class="py-3 px-4 border">Lama Sewa</th>
                            <th class="py-3 px-4 border">Total Biaya</th>
                            <th class="py-3 px-4 border">Status</th>
                            <th class="py-3 px-4 text-center border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($waitingList as $sewa)
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="py-4 px-4 border">{{ $sewa->id_penyewaan }}</td>
                                <td class="py-4 px-4 border">{{ $sewa->penyewa }}</td>
                                <td class="py-4 px-4 border">{{ $sewa->no_telepon }}</td>
                                <td class="py-4 px-4 border">{{ $sewa->email }}</td>
                                <td class="py-4 px-4 border">{{ $sewa->mobil }}</td>
                                <td class="py-4 px-4 border">
                                    {{ \Carbon\Carbon::parse($sewa->tanggal_mulai)->diffInDays($sewa->tanggal_selesai) }}
                                    hari
                                </td>
                                <td class="py-4 px-4 border">Rp {{ number_format($sewa->total_biaya, 0, ',', '.') }}</td>
                                <td class="py-4 px-4 border">
                                    @if ($sewa->status_penyewaan === 'pending')
                                        <span
                                            class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
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
                                    <form action="{{ route('permintaan.verify', $sewa->id_penyewaan) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-200 focus:outline-none transition duration-200 flex items-center justify-center space-x-2">
                                            <!-- Ikon SVG -->
                                            <svg class="w-5 h-5 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Verifikasi</span>
                                        </button>


                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
