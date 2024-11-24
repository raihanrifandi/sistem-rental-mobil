<!-- resources/views/components/confirmation.blade.php -->
<div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-lg font-bold mb-4">Konfirmasi Pembayaran</h2>
        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin melanjutkan pembayaran?</p>
        <div class="flex justify-end gap-4">
            <button id="cancelButton" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
            <form id="confirmPaymentForm" method="POST" action="{{ route('transaksi.store') }}">
                @csrf
                <input type="hidden" name="mobil_id" value="{{ $mobil->id_mobil }}">
                <button id="pay-button" class="bg-blue-500 text-white px-6 py-2 rounded-lg">
                    Bayar Sekarang  
                </button>
            </form>
        </div>
    </div>
</div>
{{-- 
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        snap.pay("{{ $snapToken }}", {
            onSuccess: function(result) {
                alert('Pembayaran berhasil!');
            },
            onPending: function(result) {
                alert('Menunggu pembayaran!');
            },
            onError: function(result) {
                alert('Pembayaran gagal!');
            }
        });
    });
</script> --}}
