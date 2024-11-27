@extends('layouts.user')
@section('title', 'Syarat & Ketentuan Penyewaan Mobil')

@section('contents')
<div class="max-w-3xl mx-auto mt-8">
    <!-- Judul -->
    <h1 class="text-2xl font-bold text-center mb-6">Syarat dan Ketentuan Penyewaan Mobil</h1>
    
    <!-- Accordion Container -->
    <div class="bg-white border border-gray-200 rounded-lg shadow">
        @foreach (['Ketentuan Umum', 'Sebelum Perjalanan', 'Selama Perjalanan', 'Setelah Perjalanan', 'Biaya-biaya','Biaya Overtime', 'Refund & Reschedule', 'Penyangkalan'] as $section)
        <div class="border-b last:border-none">
            <button class="flex items-center justify-between w-full p-4 text-left text-gray-800 font-semibold focus:outline-none hover:bg-gray-50" 
                data-accordion-target="#{{ Str::slug($section) }}" aria-expanded="false" aria-controls="{{ Str::slug($section) }}">
                {{ $section }}
                <svg data-accordion-icon class="w-4 h-4 transition-transform transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="{{ Str::slug($section) }}" class="hidden p-4 text-gray-600">
                <p>Deskripsi untuk {{ $section }}. Anda bisa mengganti ini sesuai kebutuhan.</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br><br>

<script>
    // Simple Accordion Logic
    document.querySelectorAll('[data-accordion-target]').forEach(button => {
        button.addEventListener('click', () => {
            const content = document.querySelector(button.getAttribute('data-accordion-target'));
            const isOpen = content.classList.contains('hidden');
            
            // Close all open sections
            document.querySelectorAll('[data-accordion-target]').forEach(btn => {
                const cont = document.querySelector(btn.getAttribute('data-accordion-target'));
                cont.classList.add('hidden');
                btn.querySelector('svg').classList.remove('rotate-180');
            });
            
            // Open clicked section if not already open
            if (isOpen) {
                content.classList.remove('hidden');
                button.querySelector('svg').classList.add('rotate-180');
            }
        });
    });
</script>
@endsection
