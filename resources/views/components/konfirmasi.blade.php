<!-- resources/views/components/konfirmasi.blade.php -->
<div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-lg font-bold mb-4">Konfirmasi Penyewaan</h2>
        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin melanjutkan ke tahapan pembayaran?</p>
        <div class="flex justify-end gap-4">
            <button id="cancelButton" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
            <form id="confirmPaymentForm" method="POST" action="{{ route('transaksi.store') }}">
                @csrf
                <input type="hidden" name="mobil_id" value="{{ $mobil->id_mobil }}">
                <button type="submit" id="pay-button" class="bg-blue-500 text-white px-6 py-2 rounded-lg">
                    Kirim  
                </button>
            </form>
        </div>
    </div>
</div>