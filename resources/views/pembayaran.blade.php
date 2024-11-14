@extends('layouts.app')
@section('title', 'Manajemen Pembayaran')

@section('contents')
<div class="container mx-auto">
    <h1 class="text-3xl font-semibold mb-8">Pembayaran</h1>
    <a href="{{ route('pembayaran.create') }}" class="bg-blue-500 text-white p-2 rounded">+ Tambah Pembayaran</a>

    <table class="min-w-full bg-white mt-4">
    <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="py-2 px-4">ID Pembayaran</th>
                    <th class="py-2 px-4">Jumlah</th>
                    <th class="py-2 px-4">Tanggal Pembayaran</th>
                    <th class="py-2 px-4">Penyewaan</th>
                    <th class="py-2 px-4">Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $pembayaran)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $pembayaran->id_pembayaran }}</td>
                        <td class="py-2 px-4">{{ $pembayaran->jumlah }}</td>
                        <td class="py-2 px-4">{{ $pembayaran->tanggal_pembayaran }}</td>
                        <td class="py-2 px-4">{{ $pembayaran->penyewaan->nama }}</td>
                        <td class="py-2 px-4">{{ $pembayaran->metodePembayaran->metode }}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection
