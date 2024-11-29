@extends('layouts.user')
@section('title', 'Selesaikan Pembayaran')

@section('contents')
<div class="bg-white rounded-[6px] p-6 mb-6 border border-gray-200">
    <h2 class="text-lg font-medium mb-4">Selesaikan Pembayaran</h2>
    <p class="text-red-500">
        Harap selesaikan pembayaran sebelum:
        <span id="expiration-time">{{ $transaction->token_expiration }}</span>
    </p>
    <p class="text-gray-700">
        Sisa waktu: 
        <span id="timer" class="font-bold"></span>
    </p>
    <div class="border rounded-[6px] p-4 mt-4">
        <p class="text-sm font-medium mb-2">Pilih Metode Pembayaran</p>
        <div id="snap-container"></div>
        <button id="pay-button" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-200">
            Bayar Sekarang
        </button>
    </div>
</div>

<!-- Midtrans Snap JS -->
<script type="text/javascript" 
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    // Konversi tanggal kedaluwarsa ke waktu UNIX dan tambahkan offset +7 jam
    const rawExpirationTime = new Date("{{ $transaction->token_expiration }}");
    const expirationTime = rawExpirationTime.getTime() + (7 * 60 * 60 * 1000);

    // Tampilkan waktu kedaluwarsa dengan format yang sudah ditambah +7 jam
    const adjustedExpirationTime = new Date(expirationTime);
    const formattedExpirationTime = adjustedExpirationTime.toLocaleString('id-ID', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
    document.getElementById('expiration-time').innerText = formattedExpirationTime;

    // Hitung mundur
    const timerInterval = setInterval(function () {
        const now = new Date().getTime();
        const distance = expirationTime - now;

        if (distance <= 0) {
            clearInterval(timerInterval); // Hentikan timer
            document.getElementById('timer').innerText = "Waktu habis!";
            alert('Waktu pembayaran telah habis!');
            window.location.href = '/riwayat-transaksi'; // Redirect pengguna
        } else {
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById('timer').innerText = `${minutes}m ${seconds}s`;
        }
    }, 1000);

    // Snap Midtrans
    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function (event) {
        event.preventDefault();

        // Memanggil popup Snap Midtrans
        window.snap.pay("{{ $snapToken }}", {
            onSuccess: function (result) {
                alert("Pembayaran berhasil!");
                console.log(result);
                window.location.href = '/riwayat-transaksi'; // Redirect ke riwayat transaksi
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
                alert("Anda menutup popup tanpa menyelesaikan pembayaran.");
            }
        });
    });
</script>
@endsection
