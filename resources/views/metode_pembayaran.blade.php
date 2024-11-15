@extends('layouts.app')
@section('title', 'Manajemen Metode Pembayaran')

@section('contents')
<div class="container mx-auto">
    <h1 class="text-3xl font-semibold mb-8">Metode Pembayaran</h1>
    <a href="{{ route('metode_pembayaran.create') }}" class="bg-blue-500 text-white p-2 rounded">+ Tambah Metode Pembayaran</a>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Jenis Pembayaran</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metodePembayaran as $metode)
            <tr>
                <td class="border px-4 py-2">{{ $metode->id_metode }}</td>
                <td class="border px-4 py-2">{{ $metode->jenis_pembayaran }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('metode_pembayaran.edit', $metode->id_metode) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('metode_pembayaran.destroy', $metode->id_metode) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
