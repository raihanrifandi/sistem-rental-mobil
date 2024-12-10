@extends('layouts.user')

@section('contents')
<div class="container">
    <div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden py-6 sm:py-12 bg-white">
        <div class="max-w-xl px-5 text-center">
            <img src="{{ asset('assets/img/emailSent.png') }}" class="mx-auto max-w-xs" alt="Email Telah Dikirim"><br>
            <h2 class="mb-2 text-lg font-bold text-zinc-800">Cek Inbox Kamu</h2>
            <p class="mb-2 text-lg text-zinc-500">
                Kami senang Anda telah bergabung dengan kami! Kami telah mengirimkan tautan verifikasi ke alamat email
                <span class="font-medium text-indigo-500">{{ auth()->user()->email }}</span>.
            </p>
            
            <form method="POST" action="{{ route('verification.resend') }}" id="resendForm">
                @csrf
                <button type="submit" id="resendButton" class="mt-3 inline-block w-96 rounded bg-gradient-button px-5 py-3 font-medium text-white shadow-md shadow-indigo-500/20 hover:bg-indigo-700">
                    Kirim Ulang
                </button>
            </form>
            <br>
            <a href="/login" class="mt-3 inline-block w-96 rounded bg-gray-200 px-5 py-3 font-medium text-zinc-800 shadow-md hover:bg-gray-300">
                Kembali ke halaman awal →
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const resendButton = document.getElementById('resendButton');
        const resendForm = document.getElementById('resendForm');
        
        resendForm.addEventListener('submit', function(event) {
            event.preventDefault();
            resendButton.disabled = true;
            resendButton.classList.add('bg-gray-400', 'cursor-not-allowed');
            resendButton.classList.remove('bg-gradient-button', 'hover:bg-indigo-700');
            let timer = 30;
            const interval = setInterval(() => {
                if (timer > 0) {
                    timer--;
                    resendButton.innerText = `Kirim Ulang (${timer}s)`;
                } else {
                    clearInterval(interval);
                    resendButton.disabled = false;
                    resendButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    resendButton.classList.add('bg-gradient-button', 'hover:bg-indigo-700');
                    resendButton.innerText = 'Kirim Ulang';
                }
            }, 1000);

            // Submit the form after disabling the button and starting the timer
            resendForm.submit();
        });
    });
</script>
@endsection
