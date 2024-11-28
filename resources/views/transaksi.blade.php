@extends('layouts.user')
@section('title', 'Transaksi')

@section('contents')
<div class="max-w-6xl mx-auto px-4">
    <div class="flex items-center gap-2 mb-8">
        <a href="{{ url()->previous() }}" class="text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h1 class="text-xl font-medium">Transaksi</h1>
    </div>

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-4">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl mb-4">
        {{ session('success') }}
    </div>
    @endif
    
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Left Side - Form -->
        <div class="w-full md:w-2/3">
            <div class="relative mb-6">
                <div class="flex justify-between items-center">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white step active">
                            <span>1</span>
                        </div>
                        <span class="text-sm mt-2 text-blue-500">Mengisi formulir</span>
                    </div>
                    <!-- Step 2 -->
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center step">
                            <span>2</span>
                        </div>
                        <span class="text-sm mt-2 text-gray-500">Menunggu Konfirmasi</span>
                    </div>
                    <!-- Step 3 -->
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center step">
                            <span>3</span>
                        </div>
                        <span class="text-sm mt-2 text-gray-500">Menyelesaikan Pembayaran</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="mobil_id" value="{{ $mobil->id_mobil }}">

                <div class="bg-white rounded-[6px] p-6 mb-6 border border-gray-200">
                    <h2 class="text-lg font-medium mb-4">Informasi Penyewa</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm text-gray-600 mb-2">Nama Lengkap Sesuai KTP/Paspor/SIM <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_penyewa" class="w-[456px] p-2 border border-gray-300 text-gray-900 rounded-[6px] focus:ring-2 focus:ring-blue-500" 
                                   value="{{ old('nama_penyewa', $user->name) }}" required>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-2">Alamat Email <span class="text-red-500">*</span></label>
                            <input type="email" name="alamat_email" class="w-[456px] p-2 border border-gray-300 text-gray-900 rounded-[6px] bg-gray-100 focus:ring-2 focus:ring-blue-500 cursor-not-allowed" 
                                   value="{{ $user->email }}" readonly>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                            <input type="tel" name="nomor_telepon" class="w-[456px] p-2 border border-gray-300 text-gray-900 rounded-[6px] focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_mulai" class="block text-sm text-gray-600 mb-2">Tanggal Mulai <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="w-[456px] p-2 border border-gray-300 text-gray-900 rounded-[6px] focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_selesai" class="block text-sm text-gray-600 mb-2">Tanggal Selesai <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="w-[456px] p-2 border border-gray-300 text-gray-900 rounded-[6px] focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="waktu_penjemputan" class="block text-sm text-gray-600 mb-2">Waktu Penjemputan <span class="text-red-500">*</span></label>
                            <input type="time" name="waktu_penjemputan" id="waktu_penjemputan" class="w-[456px] p-2 border border-gray-300 text-gray-900 rounded-[6px] focus:ring-2 focus:ring-blue-500" min="06:00" max="23:00" required />
                            <p id="time-warning" class="text-red-500 text-sm hidden mt-1">Waktu penjemputan harus antara 06:00-23:00 dan minimal 3 jam dari sekarang.</p>
                        </div>                   
                    </div>
                </div>

                <div class="bg-white rounded-[6px] p-6 mb-6 border border-gray-200">
                    <h2 class="text-lg font-medium mb-4">Dokumen Wajib</h2>
                    <p class="text-[16px] font-regular mb-4">KTP/SIM/Paspor</p>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or JPEG (MAX. 1MB)</p>
                            </div>
                            <input id="dokumen_wajib" type="file" class="hidden" />
                        </label>
                    </div> 
                </div>

                <div class="bg-white rounded-[6px] p-6 mb-6 border border-gray-200">
                    <h2 class="text-lg font-medium mb-4">Persetujuan & Kebijakan</h2>
                    <div class="text-sm text-gray-600">
                        <p class="mb-4">Please review the order details and payment details before proceeding to confirm your order</p>
                        <div class="flex items-start gap-2">
                            <input type="checkbox" id="agreementCheckbox" required class="mt-1">
                            <p>I agree to the 
                                <a href="#" class="text-blue-500">Terms & conditions</a>, 
                                <a href="#" class="text-blue-500">Privacy policy</a> & 
                                <a href="#" class="text-blue-500">Return policy</a>
                            </p>
                        </div>
                    </div>
                </div>

                <button type="submit" 
                        id="paymentButton"
                        disabled
                        class="w-full py-4 rounded-[10px] font-medium text-white button-disabled transition-all duration-300">
                    Konfirmasi Penyewaan
                </button>
            </form>
            <br><br>
        </div>

        <!-- Right Side - Order Summary -->
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-[6px] p-6 border border-gray-200 sticky top-4">
                <div class="flex items-center gap-4 mb-6">
                    @if($mobil->gambar)
                        <img src="{{ asset($mobil->gambar) }}" alt="{{ $mobil->merk }}" class="w-24 h-24 object-cover rounded-2xl">
                    @else
                        <div class="w-24 h-24 bg-gray-100 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <div>
                        <h3 class="font-medium">{{ $mobil->merk }} {{ $mobil->model }}</h3>
                        <p class="text-lg font-bold">Rp{{ number_format($mobil->harga_sewa, 2) }}</p>
                        <a href="#" class="text-blue-500 text-sm">Edit durasi sewa</a>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span>Kode Promo</span>
                        <a href="#" class="text-blue-500">Masukkan Kode</a>
                    </div>
                    <input type="text" placeholder="Masukkan kode promo" class="w-full p-3 border border-gray-300 text-gray-900 rounded-[6px] focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="border-t pt-4">
                    <h4 class="font-medium mb-4">Detail Pembayaran</h4>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span>Sub Total</span>
                            <span>Rp{{ number_format($mobil->harga_sewa, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Pajak</span>
                            <span>Rp{{ number_format($mobil->harga_sewa * 0.1, 2) }}</span>
                        </div>
                        <div class="flex justify-between font-bold pt-2 border-t">
                            <span>Total</span>
                            <span class="total-harga"></span>
                            {{-- <span>Rp{{ number_format($total_biaya, 2) }}</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Pop Up Konfirmasi Lanjut Ke Pembayaran--}}
@include('components.konfirmasi')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tanggalMulaiInput = document.getElementById("tanggal_mulai");
        const tanggalSelesaiInput = document.getElementById("tanggal_selesai");
        const subTotalHargaElement = document.getElementById("")
        const totalHargaElement = document.querySelector(".total-harga");
        const hargaSewaPerHari = {{ $mobil->harga_sewa }}; // Harga sewa per hari dari backend
        const pajakPersen = 0.1; // 10%

        function hitungTotalHarga() {
            const tanggalMulai = new Date(tanggalMulaiInput.value);
            const tanggalSelesai = new Date(tanggalSelesaiInput.value);

            if (!isNaN(tanggalMulai) && !isNaN(tanggalSelesai) && tanggalSelesai >= tanggalMulai) {
                const selisihHari = (tanggalSelesai - tanggalMulai) / (1000 * 60 * 60 * 24) + 1; // Menghitung jumlah hari
                const subtotal = selisihHari * hargaSewaPerHari; // Menghitung subtotal
                const pajak = hargaSewaPerHari * pajakPersen; // Menghitung pajak
                const total = subtotal + pajak; // Total harga termasuk pajak

                // Tampilkan hasil
                totalHargaElement.textContent = `${total.toLocaleString("id-ID", { style: "currency", currency: "IDR" }).replace("IDR", "")}`;
            } else {
                // Jika tanggal belum valid
                totalHargaElement.textContent = "Rp0";
            }
        }

        // Event listener untuk input tanggal
        tanggalMulaiInput.addEventListener("change", hitungTotalHarga);
        tanggalSelesaiInput.addEventListener("change", hitungTotalHarga);
    });
</script>

{{-- Midtrans Payment--}}
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" 
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script> 
<script>
var payButton = document.getElementById('pay-butto');
payButton.addEventListener('click', function () {
    event.preventDefault();
    
    // Call Snap Midtrans popup
    window.snap.pay('{{$snapToken}}', {
        onSuccess: function (result) {
            alert("Pembayaran berhasil!"); 
            console.log(result);
            window.location.href = '/';
        },
        onPending: function (result) {
            alert("Menunggu pembayaran!"); 
            console.log(result);
        },
        onError: function (result) {
            alert("Pembayaran gagal!"); 
            console.log(result);
        },
        onClose: function () {
            alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
        }
    });
});  
</script>
@endsection