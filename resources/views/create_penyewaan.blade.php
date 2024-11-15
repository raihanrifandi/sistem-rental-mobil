<!-- resources/views/penyewaan/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add Penyewaan')

@section('contents')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add New Penyewaan</h1>

        <form action="{{ route('penyewaan.store') }}" method="POST">
            @csrf
            <label>Tanggal Mulai:</label>
            <input type="date" name="tanggal_mulai" class="border p-2 rounded w-full mb-4" required>

            <label>Tanggal Selesai:</label>
            <input type="date" name="tanggal_selesai" class="border p-2 rounded w-full mb-4" required>

            <label>Total Biaya:</label>
            <input type="number" name="total_biaya" class="border p-2 rounded w-full mb-4" required>

            <label>Status Penyewaan:</label>
            <select name="status_penyewaan" class="border p-2 rounded w-full mb-4" required>
                <option value="pending">Pending</option>
                <option value="on-going">On-Going</option>
                <option value="completed">Completed</option>
                <option value="canceled">Canceled</option>
            </select>

            <!-- Assume dropdowns or text fields for id_mobil and id_pengguna are added here -->

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
@endsection
