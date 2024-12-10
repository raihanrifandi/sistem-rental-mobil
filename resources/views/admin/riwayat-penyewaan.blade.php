@extends('layouts.app')
@section('title', 'Manajemen Penyewaan')

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
            <h1 class="text-3xl font-semibold text-gray-800">Manajemen Penyewaan</h1>
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

        <!-- Tabel Penyewaan -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <th class="px-6 py-3 border">ID</th>
                        <th class="px-6 py-3 border">Nama Penyewa</th>
                        <th class="px-6 py-3 border">Mobil</th>
                        <th class="px-6 py-3 border">Tanggal Mulai</th>
                        <th class="px-6 py-3 border">Tanggal Selesai</th>
                        <th class="px-6 py-3 border">Waktu Penjemputan</th>
                        <th class="px-6 py-3 border">Total Biaya</th>
                        <th class="px-6 py-3 border">Status</th>
                        <th class="px-6 py-3 text-center border">Aksi</th>
                    </tr>
                </thead>
                <tbody id="productTableBody" class="text-gray-700">
                    @foreach ($penyewaan as $sewa)
                        <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 border">{{ $sewa->id_penyewaan }}</td>
                            <td class="px-6 py-4 border">{{ $sewa->penyewa }}</td>
                            <td class="px-6 py-4 border">{{ $sewa->mobil }}</td>
                            <td class="px-6 py-4 border">{{ $sewa->tanggal_mulai }}</td>
                            <td class="px-6 py-4 border">{{ $sewa->tanggal_selesai }}</td>
                            <td class="px-6 py-4 border">{{ $sewa->waktu_penjemputan }}</td>
                            <td class="px-6 py-4 border">Rp {{ number_format($sewa->total_biaya, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 border">
                                <span
                                    class="px-3 py-1 text-sm font-medium rounded-full 
                            {{ $sewa->status_penyewaan === 'on-going'
                                ? 'bg-yellow-100 text-yellow-700'
                                : ($sewa->status_penyewaan === 'completed'
                                    ? 'bg-green-100 text-green-700'
                                    : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($sewa->status_penyewaan) }}
                                </span>
                            </td>
                            <td class="py-12 px-8 border flex justify-center items-center text-center">
                                <!-- Tombol Edit -->
                                <a href="{{ route('penyewaan.edit', $sewa->id_penyewaan) }}" 
                                   class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600 transition duration-200 shadow">
                                   <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Form Hapus -->
                                <form action="{{ route('penyewaan.destroy', $sewa->id_penyewaan) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus penyewaan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600 transition duration-200 shadow">
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
            {{ $penyewaan->links('components.pagination') }}
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
