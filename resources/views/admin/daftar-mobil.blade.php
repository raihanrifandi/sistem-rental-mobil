@extends('layouts.app')
@section('title', 'Manajemen Produk Mobil')

@section('contents')
        <div id="toastContainer" class="fixed top-5 right-5 space-y-4 z-50"></div>

        @if (session('error'))
            <div class="alert alert-danger bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Manajemen Produk Mobil</h1>
            <a href="javascript:void(0)" onclick="openAddModal()"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-200 shadow-lg">
                + Tambah Produk
            </a>
        </div>

        <!-- Table Produk -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-1000">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Gambar</th>
                        <th scope="col" class="px-6 py-3">Merk</th>
                        <th scope="col" class="px-6 py-3">Model</th>
                        <th scope="col" class="px-6 py-3">Tahun</th>
                        <th scope="col" class="px-6 py-3">Plat</th>
                        <th scope="col" class="px-6 py-3">Transmisi</th>
                        <th scope="col" class="px-6 py-3">Kapasitas</th>
                        <th scope="col" class="px-6 py-3">Harga Sewa</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $product->id_mobil }}</td>
                            <td class="px-6 py-4">
                                @if ($product->gambar)
                                    <img src="{{ asset($product->gambar) }}" alt="Gambar Produk"
                                        class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-1000">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $product->merk }}</td>
                            <td class="px-6 py-4">{{ $product->model }}</td>
                            <td class="px-6 py-4">{{ $product->tahun }}</td>
                            <td class="px-6 py-4">{{ $product->plat }}</td>
                            <td class="px-6 py-4">{{ $product->transmisi }}</td>
                            <td class="px-6 py-4">{{ $product->kapasitas }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($product->harga_sewa, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 text-xs font-medium rounded-full 
                                        {{ $product->status === 'available'
                                            ? 'bg-green-100 text-green-700'
                                            : ($product->status === 'rented'
                                                ? 'bg-red-100 text-red-700'
                                                : 'bg-yellow-100 text-yellow-700') }}">
                                    {{ $product->status === 'available' ? 'Tersedia' : ($product->status === 'rented' ? 'Disewa' : 'Pemeliharaan') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <!-- Tombol Edit -->
                                <button onclick="openEditModal(this)" data-id_mobil="{{ $product->id_mobil }}"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Edit
                                </button>
                                <!-- Form Hapus -->
                                <form action="{{ route('products.destroy', $product->id_mobil) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    <!-- Modal Edit Produk -->
    <div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl" style="overflow-y: auto; max-height: 80vh;">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Produk Mobil</h2>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" id="productId" name="id_mobil">

                <!-- Input Gambar -->
                <div class="mb-4">
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <div class="mt-1">
                        <input type="file" id="gambar" name="gambar" class="p-2 w-full border rounded">
                    </div>
                </div>

                <!-- Input lainnya -->
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
                    <label for="transmisi" class="block text-sm font-medium text-gray-700">Transmisi</label>
                    <select id="transmisi" name="transmisi" class="mt-1 p-2 w-full border rounded" required>
                        <option value="" disabled selected>Pilih Transmisi</option>
                        <option value="manual">Manual</option>
                        <option value="matic">Matic</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas Penumpang</label>
                    <select id="kapasitas" name="kapasitas" class="mt-1 p-2 w-full border rounded" required>
                        <option value="" disabled selected>Pilih Kapasitas</option>
                        <option value="2">2 Penumpang</option>
                        <option value="4">4 Penumpang</option>
                        <option value="6">6 Penumpang</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="harga_sewa" class="block text-sm font-medium text-gray-700">Harga Sewa</label>
                    <input type="number" id="harga_sewa" name="harga_sewa" class="mt-1 p-2 w-full border rounded"
                        required>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah Produk -->
    <div id="addModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center overflow-y-auto">
        <div class="grid grid-cols-12 w-full h-full items-start mt-10">
            <div class="col-span-3"></div>
            <div class="col-span-6 bg-white p-8 rounded-lg shadow-lg max-h-[90vh] overflow-y-auto">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Produk Mobil</h2>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="addMerk" class="block text-sm font-medium text-gray-700">Merk</label>
                        <input type="text" id="addMerk" name="merk" class="mt-1 p-2 w-full border rounded"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="addModel" class="block text-sm font-medium text-gray-700">Model</label>
                        <input type="text" id="addModel" name="model" class="mt-1 p-2 w-full border rounded"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="addTahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                        <input type="number" id="addTahun" name="tahun" class="mt-1 p-2 w-full border rounded"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="addPlat" class="block text-sm font-medium text-gray-700">Plat</label>
                        <input type="text" id="addPlat" name="plat" class="mt-1 p-2 w-full border rounded"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="addTransmisi" class="block text-sm font-medium text-gray-700">Transmisi</label>
                        <select id="addTransmisi" name="transmisi" class="mt-1 p-2 w-full border rounded" required>
                            <option value="" disabled selected>--Pilih Transmisi--</option>
                            <option value="manual">Manual</option>
                            <option value="matic">Matic</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="addKapasitas" class="block text-sm font-medium text-gray-700">Kapasitas
                            Penumpang</label>
                        <select id="addKapasitas" name="kapasitas" class="mt-1 p-2 w-full border rounded" required>
                            <option value="" disabled selected>--Pilih Kapasitas--</option>
                            <option value="2">2 Penumpang</option>
                            <option value="4">4 Penumpang</option>
                            <option value="6">6 Penumpang</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="addHargaSewa" class="block text-sm font-medium text-gray-700">Harga Sewa</label>
                        <input type="number" id="addHargaSewa" name="harga_sewa" class="mt-1 p-2 w-full border rounded"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="addDeskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="addDeskripsi" name="deskripsi" rows="4" class="mt-1 p-2 w-full border rounded" required></textarea>
                    </div>

                    <!-- Input Gambar -->
                    <div class="mb-4">
                        <label for="addGambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" id="addGambar" name="gambar" class="mt-1 p-2 w-full border rounded"
                            accept="image/*">
                    </div>

                    <div class="flex justify-end space-x-3 sticky bottom-0 bg-white pt-4">
                        <button type="button" onclick="closeAddModal()"
                            class="bg-gray-400 text-white px-4 py-2 rounded">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
                    </div>
                </form>
            </div>
            <div class="col-span-3"></div>
        </div>
    </div>
@endsection
