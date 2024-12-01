@extends('layouts.app')
@section('title', 'Manajemen Pembayaran')

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
            <h1 class="text-3xl font-semibold text-gray-800">Manajemen Pembayaran</h1>
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

        <!-- Tabel Pembayaran -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">ID Pembayaran</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Jumlah</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Tanggal Pembayaran</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">ID Penyewaan</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Metode Pembayaran</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-semibold text-sm uppercase tracking-wider border">Status Pembayaran</th>
                        <th class="py-3 px-4 text-center text-gray-600 font-semibold text-sm uppercase tracking-wider border">Aksi</th>
                    </tr>
                </thead>
                <tbody id="productTableBody" class="text-gray-700">
                    @foreach ($pembayaranList as $pembayaran)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="py-4 px-4 border">{{ $pembayaran->id_pembayaran }}</td>
                            <td class="py-4 px-4 border">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                            <td class="py-4 px-4 border">{{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d M Y') }}</td>
                            <td class="py-4 px-4 border">{{ $pembayaran->id_penyewaan }}</td>
                            <td class="py-4 px-4 border">{{ $pembayaran->jenis_pembayaran }}</td>
                            <td class="py-4 px-4 border">
                                <span class="px-3 py-1 text-sm font-medium rounded-full 
                                    {{ $pembayaran->status_pembayaran === 'pending' ? 'bg-red-100 text-yellow-700' : 
                                    ($pembayaran->status_pembayaran === 'lunas' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($pembayaran->status_pembayaran) }}
                                </span>
                            </td>
                            <td class="py-4 px-4 border text-center">
                                <!-- Tombol View Modal -->
                                <button 
                                    class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 transition duration-200 shadow mx-1" 
                                    data-modal-toggle="detailModal{{ $pembayaran->id_pembayaran }}">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Detail Pembayaran -->
                        <div id="detailModal{{ $pembayaran->id_pembayaran }}" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="bg-white rounded-lg shadow-lg w-96 p-6 relative">
                                <button type="button" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" data-modal-toggle="detailModal{{ $pembayaran->id_pembayaran }}">
                                    <i class="fas fa-times"></i>
                                </button>
                                <h3 class="text-xl font-semibold text-gray-800 mb-4">Detail Pembayaran</h3>
                                <p><strong>ID Pembayaran:</strong> {{ $pembayaran->id_pembayaran }}</p>
                                <p><strong>Jumlah Pembayaran:</strong> Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</p>
                                <p><strong>Tanggal Pembayaran:</strong> {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d M Y') }}</p>
                                <p><strong>ID Penyewaan:</strong> {{ $pembayaran->id_penyewaan }}</p>
                                <p><strong>Metode Pembayaran:</strong> {{ $pembayaran->jenis_pembayaran}}</p>
                                <p><strong>Status Pembayaran:</strong> {{ ucfirst($pembayaran->status_pembayaran) }}</p>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $pembayaranList->links('components.pagination') }}
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
