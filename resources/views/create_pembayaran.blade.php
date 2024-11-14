@extends('layouts.app')
@section('title', 'Tambah Pembayaran')

@section('contents')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Tambah Pembayaran</h1>

        <!-- Form -->
        <form action="{{ route('pembayaran.store') }}" method="POST" class="bg-white p-6 shadow-md rounded-lg">
            @csrf

            <!-- Jumlah -->
            <div class="mb-4">
                <label for="jumlah" class="block text-gray-700">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <!-- Tanggal Pembayaran -->
            <div class="mb-4">
                <label for="tanggal_pembayaran" class="block text-gray-700">Tanggal Pembayaran</label>
                <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <!-- Penyewaan -->
            <div class="mb-4">
                <label for="id_penyewaan" class="block text-gray-700">Penyewaan</label>
                <select name="id_penyewaan" id="id_penyewaan" class="w-full px-4 py-2 border rounded-lg" required>
                    @foreach ($penyewaans as $penyewaan)
                        <option value="{{ $penyewaan->id_penyewaan }}">{{ $penyewaan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-4">
                <label for="id_metode" class="block text-gray-700">Metode Pembayaran</label>
                <select name="id_metode" id="id_metode" class="w-full px-4 py-2 border rounded-lg" required>
                    @foreach ($metodePembayarans as $metode)
                        <option value="{{ $metode->id_metode }}">{{ $metode->jenis_pembayaran }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-full w-full">
                    Simpan Pembayaran
                </button>
            </div>
        </form>
    </div>
@endsection
