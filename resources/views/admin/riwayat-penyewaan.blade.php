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
                            <td class="px-6 py-4 border">{{ $sewa->mobil }}</td>
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
