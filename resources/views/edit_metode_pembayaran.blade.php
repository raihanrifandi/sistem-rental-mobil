@extends('layouts.app')
@section('title', 'Edit Metode Pembayaran')

@section('contents')
    <div class="container mx-auto">
        <h1 class="text-3xl font-semibold mb-8">Edit Metode Pembayaran</h1>
        <form action="{{ route('metode_pembayaran.update', $metodePembayaran->id_metode) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="jenis_pembayaran" class="block text-gray-700">Jenis Pembayaran:</label>
                <input type="text" name="jenis_pembayaran" id="jenis_pembayaran" class="border p-2 w-full"
                    value="{{ $metodePembayaran->jenis_pembayaran }}" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
        </form>
    </div>
@endsection
