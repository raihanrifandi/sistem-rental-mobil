@extends('layouts.app')

@section('title', 'Penyewaan')

@section('contents')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Request Penyewaan</h1>

    <!-- Tabel Penyewaan -->
    <table class="table-auto w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">No Telepon</th>
                <th class="px-4 py-2 text-left">Tanggal Mulai</th>
                <th class="px-4 py-2 text-left">Tanggal Selesai</th>
                <th class="px-4 py-2 text-left">Total Biaya</th>
                <th class="px-4 py-2 text-left">Validasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyewaan as $item)
            <tr class="border-t">
                <!-- Nama dan No Telepon -->
                <td class="px-4 py-2">{{ $item->user->name ?? 'Tidak Tersedia' }}</td>
                <td class="px-4 py-2">{{ $item->user->phone_number ?? 'Tidak Tersedia' }}</td>

                <!-- Data Penyewaan -->
                <td class="px-4 py-2">{{ $item->tanggal_mulai }}</td>
                <td class="px-4 py-2">{{ $item->tanggal_selesai }}</td>
                <td class="px-4 py-2">{{ number_format($item->total_biaya, 0, ',', '.') }}</td>

                <!-- Validasi -->
                <td class="px-4 py-2">
                    @if($item->validasi === 'accept')
                    <span class="text-green-500">Accepted</span>
                    @elseif($item->validasi === 'reject')
                    <span class="text-red-500">Rejected</span>
                    @else
                    <button class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 accept-btn" data-item-id="{{ $item->id_penyewaan }}">
                        Accept
                    </button>
                    <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 reject-btn" data-item-id="{{ $item->id_penyewaan }}">
                        Reject
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const acceptButtons = document.querySelectorAll('.accept-btn');
        const rejectButtons = document.querySelectorAll('.reject-btn');

        // Handle Accept Button Click
        acceptButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.dataset.itemId;

                fetch(`/penyewaan/${itemId}/validasi`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            validasi: 'accept'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            location.reload();
                        }
                    });
            });
        });

        // Handle Reject Button Click
        rejectButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.dataset.itemId;

                fetch(`/penyewaan/${itemId}/validasi`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            validasi: 'reject'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            location.reload();
                        }
                    });
            });
        });
    });
</script>

@endsection