<!-- resources/views/penyewaan/index.blade.php -->
@extends('layouts.app')

@section('title', 'Penyewaan')

@section('contents')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Penyewaan List</h1>

        <a href="{{ route('penyewaan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Penyewaan</a>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Total Biaya</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penyewaan as $item)
                    <tr>
                        <td>{{ $item->tanggal_mulai }}</td>
                        <td>{{ $item->tanggal_selesai }}</td>
                        <td>{{ $item->total_biaya }}</td>
                        <td>{{ $item->status_penyewaan }}</td>
                        <td>
                            <a href="{{ route('penyewaan.edit', $item->id_penyewaan) }}" class="text-blue-500">Edit</a> |
                            <form action="{{ route('penyewaan.destroy', $item->id_penyewaan) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
