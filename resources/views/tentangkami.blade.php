@extends('layouts.user')
@section('title', 'TentangKami')

@section('contents')
    <div class="bg-white text-gray-800">
        <div class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <!-- Left Content (Teks) -->
                <div class="text-left">
                    <h1 class="text-4xl font-bold mb-6">
                        Doa Ibu Rental
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        <a class="text-blue-500 font-semibold" href="#">
                            DoaIbuRental.com
                        </a>
                        adalah platform web yang menyediakan layanan sewa mobil dengan kemudahan, keamanan, dan harga yang
                        kompetitif. Situs ini menawarkan berbagai pilihan mobil, termasuk Honda CRV, Avanza Veloz, dan
                        Pajero Sport, yang bisa disewa harian dengan harga yang terjangkau. Kami berkomitmen untuk
                        memberikan pengalaman berkendara yang nyaman dan aman bagi pelanggan kami yang ingin menjelajahi
                        keindahan Pulau Bangka.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Dengan armada mobil yang berkualitas dan layanan yang profesional, kami siap memenuhi kebutuhan
                        perjalanan Anda di Pulau Bangka.
                    </p>
                    <a href="{{ route('car.list') }}"
                        class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-blue-700 transition-all">
                        Lihat Mobil
                    </a>
                </div>
                <!-- Right Content (Gambar) -->
                <div class="flex justify-center">
                    <img src="{{ asset('assets/img/Car rental-pana.svg') }}"
                        alt="Ilustrasi orang menyewa mobil menggunakan aplikasi" class="w-full max-w-md md:max-w-lg">
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8">
                Pertanyaan Yang Sering Ditanyakan
            </h2>
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
