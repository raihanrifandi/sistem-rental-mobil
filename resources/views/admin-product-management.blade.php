@extends('layouts.app')
@section('title', 'Manajemen Produk Mobil')

@section('contents')
<div class="container mx-auto">

    @if(session('error'))
    <div class="alert alert-danger bg-red-500 text-white p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-semibold text-gray-800">Manajemen Produk Mobil</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-200 shadow-lg">
            + Tambah Produk
        </a>
    </div>

    <!-- Table Produk -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">ID Mobil</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Merk</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Model</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Tahun</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Plat</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Harga Sewa</th>
                    <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Status</th>
                    <th class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($products as $product)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="py-4 px-4 border">{{ $product->id_mobil }}</td>
                    <td class="py-4 px-4 border">{{ $product->merk }}</td>
                    <td class="py-4 px-4 border">{{ $product->model }}</td>
                    <td class="py-4 px-4 border">{{ $product->tahun }}</td>
                    <td class="py-4 px-4 border">{{ $product->plat }}</td>
                    <td class="py-4 px-4 border">Rp {{ number_format($product->harga_sewa, 0, ',', '.') }}</td>
                    <td class="py-4 px-4 border">
                        <span class="px-3 py-1 text-sm font-medium rounded-full {{ $product->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $product->status === 'available' ? 'Tersedia' : 'Disewa' }}
                        </span>
                    </td>
                    <td class="py-4 px-4 border flex items-center justify-center space-x-2">
                        <!-- Tombol Edit dengan Modal -->
                        <button
                            onclick="openEditModal(this)"
                            data-id_mobil="{{ $product->id_mobil }}"
                            data-merk="{{ $product->merk }}"
                            data-model="{{ $product->model }}"
                            data-tahun="{{ $product->tahun }}"
                            data-plat="{{ $product->plat }}"
                            data-harga_sewa="{{ $product->harga_sewa }}"
                            class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600 transition duration-200 shadow">
                            Edit Produk
                        </button>
                        <form action="{{ route('products.destroy', $product->id_mobil) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600 transition duration-200 shadow">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Edit Produk -->
<div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Produk Mobil</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="productId" name="id_mobil">
            <div class="mb-4">
                <label for="merk" class="block text-sm font-medium text-gray-700">Merk</label>
                <input type="text" id="merk" name="merk" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-4">
                <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                <input type="text" id="model" name="model" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" id="tahun" name="tahun" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-4">
                <label for="plat" class="block text-sm font-medium text-gray-700">Plat</label>
                <input type="text" id="plat" name="plat" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="mb-4">
                <label for="harga_sewa" class="block text-sm font-medium text-gray-700">Harga Sewa</label>
                <input type="number" id="harga_sewa" name="harga_sewa" class="mt-1 p-2 w-full border rounded" required>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(button) {
        // Ambil nilai dari atribut data- pada tombol yang diklik
        const product = {
            id_mobil: button.getAttribute('data-id_mobil'),
            merk: button.getAttribute('data-merk'),
            model: button.getAttribute('data-model'),
            tahun: button.getAttribute('data-tahun'),
            plat: button.getAttribute('data-plat'),
            harga_sewa: button.getAttribute('data-harga_sewa')
        };

        // Set nilai input form modal dengan data produk yang dipilih
        document.getElementById('editForm').action = '/products/' + product.id_mobil;
        document.getElementById('productId').value = product.id_mobil;
        document.getElementById('merk').value = product.merk;
        document.getElementById('model').value = product.model;
        document.getElementById('tahun').value = product.tahun;
        document.getElementById('plat').value = product.plat;
        document.getElementById('harga_sewa').value = product.harga_sewa;

        // Tampilkan modal
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection