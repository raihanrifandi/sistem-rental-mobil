@extends('layouts.user')
@section('title', 'TentangKami')

@section('contents')
    <div class="container mx-auto px-6 py-16">
        <div class="flex flex-col items-center gap-10">
            <div class="text-left mx-auto max-w-3xl">
                <h1 class="text-4xl text-black font-bold mb-6 text-center">Syarat & Ketentuan</h1>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    Sebelumnya kami ucapkan, terima kasih telah mengunjungi situs website kami, <span
                        class="font-semibold text-gray-800">Rentalyukk.com</span>. Kami selalu menyediakan layanan terbaik
                    dalam jasa rental mobil di Bangka, untuk segala keperluan Anda dan keluarga selama bisnis atau liburan
                    Anda di Bangka.
                </p>
                <p class="text-lg text-gray-600 leading-relaxed mb-6">
                    Pemesanan bisa dilakukan dengan mengisi form pemesanan kami dengan lengkap dan diisi dengan data yang
                    valid. Dengan pengisian data yang lengkap dan valid akan memudahkan kami dalam memproses permintaan Anda
                    dalam pemesanan sewa mobil.
                </p>
                <p class="text-lg text-gray-600 font-bold">
                    Jika ada dari syarat dan ketentuan sewa mobil di atas yang kurang jelas, atau susah dimengerti, silakan
                    tanyakan kepada kami! Kami selalu siap membantu menjelaskan sebaik mungkin kepada setiap pelanggan sewa
                    kendaraan di <span class="font-semibold text-gray-800">Rentalyukk.com</span>.
                </p>
            </div>
        </div>
    </div>


    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h1 class="lg:text-4x1 text-2xl md:text-3xl text-black font-bold text-center mb-8">
                Pertanyaan Yang Sering Ditanyakan
            </h1>
            <div class="space-y-4">
                <!-- Item 1 -->
                <div class="bg-white shadow-md rounded-lg">
                    <button
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-gray-800 font-semibold focus:outline-none"
                        onclick="toggleAccordion(1)">
                        Bagaimana cara memesan mobil?
                        <span id="icon-1" class="transform transition-transform">
                            ▼
                        </span>
                    </button>
                    <div id="content-1" class="hidden px-6 pb-4 text-gray-600">
                        Anda dapat memesan mobil melalui website kami dengan memilih mobil yang tersedia, kemudian mengikuti
                        proses pemesanan yang telah disediakan.
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="bg-white shadow-md rounded-lg">
                    <button
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-gray-800 font-semibold focus:outline-none"
                        onclick="toggleAccordion(2)">
                        Bagaimana cara melihat daftar mobil yang tersedia?
                        <span id="icon-2" class="transform transition-transform">
                            ▼
                        </span>
                    </button>
                    <div id="content-2" class="hidden px-6 pb-4 text-gray-600">
                        Anda dapat melihat daftar mobil yang tersedia dengan mengunjungi halaman katalog mobil di website
                        kami.
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="bg-white shadow-md rounded-lg">
                    <button
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-gray-800 font-semibold focus:outline-none"
                        onclick="toggleAccordion(3)">
                        Apa yang perlu dibawa saat mengambil mobil?
                        <span id="icon-3" class="transform transition-transform">
                            ▼
                        </span>
                    </button>
                    <div id="content-3" class="hidden px-6 pb-4 text-gray-600">
                        Anda perlu membawa KTP, SIM, dan bukti pemesanan saat mengambil mobil.
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="bg-white shadow-md rounded-lg">
                    <button
                        class="flex justify-between items-center w-full px-6 py-4 text-left text-gray-800 font-semibold focus:outline-none"
                        onclick="toggleAccordion(4)">
                        Bagaimana cara membatalkan pemesanan mobil?
                        <span id="icon-4" class="transform transition-transform">
                            ▼
                        </span>
                    </button>
                    <div id="content-4" class="hidden px-6 pb-4 text-gray-600">
                        Anda dapat membatalkan pemesanan mobil dengan menghubungi layanan pelanggan kami melalui kontak yang
                        tersedia.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAccordion(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);

            // Toggle visibility
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>

@endsection
