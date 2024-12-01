@extends('layouts.app')
@section('title', 'Manajemen Pembayaran')

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
            <h1 class="text-3xl font-semibold text-gray-800">Manajemen Pembayaran</h1>
        </div>

        <!-- Tabel Pembayaran -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <th class="px-6 py-3 border">ID Pembayaran</th>
                        <th class="px-6 py-3 border">Jumlah</th>
                        <th class="px-6 py-3 border">Tanggal Pembayaran</th>
                        <th class="px-6 py-3 border">ID Penyewaan</th>
                        <th class="px-6 py-3 border">Metode Pembayaran</th>
                        <th class="px-6 py-3 border">Status Pembayaran</th>
                        <th class="px-6 py-3 text-center border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-400">
                    @foreach ($pembayaranList as $pembayaran)
                        <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-600 transition duration-200">
                            <td class="px-6 py-4 border">{{ $pembayaran->id_pembayaran }}</td>
                            <td class="px-6 py-4 border">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 border">
                                {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d M Y') }}</td>
                            <td class="px-6 py-4 border">{{ $pembayaran->id_penyewaan }}</td>
                            <td class="px-6 py-4 border">{{ $pembayaran->jenis_pembayaran }}</td>
                            <td class="px-6 py-4 border">
                                <span
                                    class="px-3 py-1 text-sm font-medium rounded-full 
                            {{ $pembayaran->status_pembayaran === 'pending'
                                ? 'bg-yellow-100 text-yellow-700'
                                : ($pembayaran->status_pembayaran === 'completed'
                                    ? 'bg-green-100 text-green-700'
                                    : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($pembayaran->status_pembayaran) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center border">
                                <!-- Tombol View Modal -->
                                <button
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-blue-200 focus:outline-none transition duration-200 shadow mx-1"
                                    data-modal-toggle="detailModal{{ $pembayaran->id_pembayaran }}">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Detail Pembayaran -->
                        <div id="detailModal{{ $pembayaran->id_pembayaran }}"
                            class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50"
                            role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="bg-white rounded-lg shadow-lg w-96 p-6 relative">
                                <button type="button" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800"
                                    data-modal-toggle="detailModal{{ $pembayaran->id_pembayaran }}">
                                    <i class="fas fa-times"></i>
                                </button>
                                <h3 class="text-xl font-semibold text-gray-800 mb-4">Detail Pembayaran</h3>
                                <p><strong>ID Pembayaran:</strong> {{ $pembayaran->id_pembayaran }}</p>
                                <p><strong>Jumlah Pembayaran:</strong> Rp
                                    {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</p>
                                <p><strong>Tanggal Pembayaran:</strong>
                                    {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d M Y') }}</p>
                                <p><strong>ID Penyewaan:</strong> {{ $pembayaran->id_penyewaan }}</p>
                                <p><strong>Metode Pembayaran:</strong> {{ $pembayaran->jenis_pembayaran }}</p>
                                <p><strong>Status Pembayaran:</strong> {{ ucfirst($pembayaran->status_pembayaran) }}</p>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Script Modal Toggle -->
        <script>
            document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                button.addEventListener('click', (event) => {
                    const targetModalId = button.getAttribute('data-modal-toggle');
                    const modal = document.getElementById(targetModalId);
                    modal.classList.toggle('hidden');
                });
            });
        </script>
    @endsection
