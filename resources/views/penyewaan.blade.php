@extends('layouts.app')

@section('title', 'Penyewaan')

@section('contents')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Penyewaan List</h1>

    <!-- Tabel Penyewaan -->
    <table class="table-auto w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-left">No Telepon</th>
                <th class="px-4 py-2 text-left">Tanggal Mulai</th>
                <th class="px-4 py-2 text-left">Tanggal Selesai</th>
                <th class="px-4 py-2 text-left">Total Biaya</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Edit Status</th>
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
                <td class="px-4 py-2">{{ ucfirst($item->status_penyewaan) }}</td>

                <td class="px-4 py-2">
                    @if ($item->validasi === 'accept')
                    <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 edit-btn"
                        data-item-id="{{ $item->id_penyewaan }}"
                        data-status="{{ $item->status_penyewaan }}">
                        Edit Status
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="text-xl font-bold mb-4">Edit Status Penyewaan</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status_penyewaan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="on-going">On-Going</option>
                    <option value="completed">Completed</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" id="cancelButton"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');
        const modal = document.getElementById('editModal');
        const editForm = document.getElementById('editForm');
        const cancelButton = document.getElementById('cancelButton');
        const statusField = document.getElementById('status');


        // Handle Edit Button Click
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.dataset.itemId;
                const status = this.dataset.status;


                editForm.action = `/penyewaan/${itemId}`;
                statusField.value = status;

                modal.classList.remove('hidden');
            });
        });

        cancelButton.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    });
</script>

@endsection