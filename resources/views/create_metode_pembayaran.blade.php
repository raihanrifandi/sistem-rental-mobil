@extends('layouts.app')
@section('title', 'Tambah Metode Pembayaran')

@section('contents')
<div class="container mx-auto">
    <h1 class="text-3xl font-semibold mb-8">Tambah Metode Pembayaran</h1>
    <form action="{{ route('metode_pembayaran.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="jenis_pembayaran" class="block text-gray-700">Jenis Pembayaran:</label>
            <input type="text" name="jenis_pembayaran" id="jenis_pembayaran" class="border p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
    </form>
</div>
@endsection
