@extends('layouts.app')
@section('title', 'Manajemen Produk Mobil')

@section('contents')
    <div class="container mx-auto">
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

         <!-- Search Bar -->
         <div class="mb-4 flex items-center relative">
            <input
              class="appearance-none border-2 pl-10 border-gray-300 hover:border-gray-400 transition-colors rounded-md w-[256px] py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-purple-600 focus:border-purple-600 focus:shadow-outline"
              id="searchInput"
              type="text"
              placeholder="Search..."
            />
          
            <div class="absolute left-0 inset-y-0 flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 ml-3 text-gray-400 hover:text-gray-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
              </svg>
            </div>
          </div>
        <br>

        <!-- Table Produk -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white border ">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            ID</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Gambar</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Merk</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Model</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Tahun</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Plat</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Transmisi</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Kapasitas</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Harga Sewa</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Status</th>
                        <th
                            class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="productTableBody" class="text-gray-700 ">
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="py-4 px-4 border">{{ $product->id_mobil }}</td>
                            <!-- Kolom Gambar -->
                            <td class="py-4 px-4 border ">
                                @if ($product->gambar)
                                    <img src="{{ asset($product->gambar) }}" alt="Gambar Produk"
                                        class="w-24 h-24 object-cover rounded">
                                @else
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                @endif
                            </td>

                            <td class="py-4 px-4 border">{{ $product->merk }}</td>
                            <td class="py-4 px-4 border">{{ $product->model }}</td>
                            <td class="py-4 px-4 border">{{ $product->tahun }}</td>
                            <td class="py-4 px-4 border">{{ $product->plat }}</td>
                            <td class="py-4 px-4 border">{{ ucfirst($product->transmisi) }}</td>
                            <td class="py-4 px-4 border">{{ $product->kapasitas }}</td>
                            <td class="py-4 px-4 border">Rp {{ number_format($product->harga_sewa, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 border">
                                <span
                                    class="px-3 py-1 text-sm font-medium rounded-full 
                            {{ $product->status === 'available'
                                ? 'bg-green-100 text-green-700'
                                : ($product->status === 'rented'
                                    ? 'bg-red-100 text-red-700'
                                    : 'bg-yellow-100 text-yellow-700') }}">
                                    {{ $product->status === 'available' ? 'Tersedia' : ($product->status === 'rented' ? 'Disewa' : 'Pemeliharaan') }}
                                </span>
                            </td>

                            <td class="py-12 px-8 border flex justify-center items-center text-center">
                                <!-- Tombol Edit -->
                                <button onclick="openEditModal(this)" data-id_mobil="{{ $product->id_mobil }}"
                                    data-merk="{{ $product->merk }}" data-model="{{ $product->model }}"
                                    data-tahun="{{ $product->tahun }}" data-plat="{{ $product->plat }}"
                                    data-kapasitas="{{ $product->kapasitas }}" data-transmisi="{{ $product->transmisi }}"
                                    data-harga_sewa="{{ $product->harga_sewa }}" data-status="{{ $product->status}}"
                                    class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600 transition duration-200 shadow">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <!-- Form Hapus -->
                                <form action="{{ route('products.destroy', $product->id_mobil) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600 transition duration-200 shadow">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $products->links('components.pagination') }}
        </div>
    </div>

    <!-- Modal Edit Produk -->
    <div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center p-4 z-50">
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

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" class="mt-1 p-2 w-full border rounded" required>
                        <option value="" disabled selected>Pilih Status</option>
                        @foreach (['available', 'rented', 'maintenance'] as $status)
                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
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
    <div id="addModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center overflow-y-auto z-50">
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
    <script>
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                let value = $(this).val().toLowerCase();
                $("#productTableBody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
@endsection
