@extends('layouts.user')
@section('title', 'Home')

@section('contents')
    <!-- Scroll to Top Button -->
    <button id="scrollToTop"
        class="fixed bottom-5 right-5 bg-gradient-to-b from-[#038EFF] to-[#65BAFF] text-white w-14 h-14 flex items-center justify-center rounded-full shadow-lg opacity-0 transition-opacity duration-500">
        ↑
    </button>

    <main>
        <!-- Hero Section -->
        <section class="relative overflow-hidden w-full">
            <div class="px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <!-- Left Content -->
                    <div data-aos="fade-right">
                        <div class="flex items-center space-x-2 mb-4">
                            <span class="text-gray-600">⭐ 4.7 Rating</span>
                        </div>
                        <h1 class="text-4xl md:text-[56px] font-semibold mb-4 leading-[72px]">
                            Sewa Mobil Impianmu <br> Dengan
                            <span class="text-[#038EFF]">Doa Ibu</span>
                            <img src="assets/img/underline.png" alt="Underline Element"
                                style="position: absolute; top: 188px; left: 210px; z-index: 0; width: 219px; height: 11px;">
                        </h1>
                        </h1>
                        <br>
                        <p class="text-gray-1000 font-regular mb-8">
                            Lebih dari sekedar rental mobil. Kami hadir untuk <br> memastikan setiap langkah perjalanan Anda
                            aman <br> dan nyaman, layaknya diiringi dengan doa ibu.
                        </p>
                        <button
                            class="bg-gradient-to-b from-[#65BAFF] to-[#038EFF] text-white px-8 py-3 rounded-[14px] hover:shadow-lg transition duration-300">
                            <a href="{{ route('car.list') }}">Sewa Sekarang! </a>
                        </button>
                    </div>
                    <!-- Right Content -->
                    <div data-aos="fade-left">
                        <img src="assets/img/hero-img.png" alt="Toyota Camry" class="w-full">
                    </div>
                    <img src="assets/img/dot.png" alt="Dotted Element" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="150" data-aos-easing="ease-in-out"
                        data-aos-repeat="true"style="position: absolute; top: 440px; left: 560px; z-index: 0; width: 49px; height: 28px;">
                    <img src="assets/img/dot.png" alt="Dotted Element" data-aos="fade-up" data-aos-duration="750"
                        data-aos-delay="100" data-aos-easing="ease-in-out" data-aos-repeat="true"
                        style="position: absolute; top: 585px; left: 1160px; z-index: 0; width: 49px; height: 28px;">
                </div>
            </div>
            <!-- Why Choose Us Section -->
            <section class="py-16 bg-white-0 lg:py-100">
                <div class="px-4 sm:px-8 lg:px-8 py-18">
                    <h2 class="text-3xl md:text-[48px] font-semibold text-center mb-12 leading-[72px]">
                        Kenapa Harus Pilih Kami Untuk Perjalanan Yang <br>
                        Aman, Nyaman, Dan Terpercaya?
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center max-w-12xl mx-auto">
                        <div data-aos="fade-right">
                            <img src="assets/img/section1-img.png" alt="Jaguar F-Pace" class="w-[1200px] h-auto">
                        </div>
                        <img src="assets/img/dot.png" alt="Dotted Element" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="150" data-aos-easing="ease-in-out" data-aos-repeat="true"
                            style="position: absolute; top: 1000px; left: 75px; z-index: 1; width: 49px; height: 28px;">
                        <div data-aos="fade-left" class="space-y-6">
                            <!-- Feature 1 -->
                            <div class="flex items-start space-x-3">
                                <div class="w-16 h-16 flex items-center justify-center">
                                    <img src="assets/img/kelebihan1.png" alt="Well-Maintained Cars Icon"
                                        class="w-32 h-32 object-contain">
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-2xl font-semibold mb-1">Well-Maintained Cars</h3>
                                    <p class="text-gray-600 text-sm">Every car is in excellent condition, with regular
                                        maintenance ensuring your safety and comfort</p>
                                </div>
                            </div>

                            <!-- Feature 2 -->
                            <div class="flex items-start space-x-3">
                                <div class="w-16 h-16 flex items-center justify-center">
                                    <img src="assets/img/kelebihan2.png" alt="Flexible and Easy Icon"
                                        class="w-32 h-32 object-contain">
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-2xl font-semibold mb-1">Flexible and Easy</h3>
                                    <p class="text-gray-600 text-sm">Choose a car that fits your needs and set the rental
                                        duration according to your travel plans</p>
                                </div>
                            </div>

                            <!-- Feature 3 -->
                            <div class="flex items-start space-x-3">
                                <div class="w-16 h-16 flex items-center justify-center">
                                    <img src="assets/img/kelebihan3.png" alt="24/7 Support Icon"
                                        class="w-32 h-32 object-contain">
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-2xl font-semibold mb-1">24/7 Customer Support</h3>
                                    <p class="text-gray-600 text-sm">We are always ready to assist you, anytime, anywhere
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Car Brands Section -->
            <section class="py-16 flex justify-center items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
                    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">
                        Temukan Mobil Yang Sesuai Dengan<br>
                        Gaya Dan Kebutuhan Anda
                    </h2>
                    <div class="swiper-container">
                        <div class="swiper-wrapper items-center">

                        </div>
                    </div>
                </div>
            </section>

            <!-- Start Your Journey Section -->
            <section class="py-36 relative bg-cover bg-center bg-no-repeat"
                style="background-image: url('assets/img/footerBg.png')">
                <!-- Overlay optional untuk memastikan teks tetap terbaca -->
                <div class="absolute inset-0 bg-white/0"></div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
                    <h2 class="text-3xl md:text-[42px] font-semibold mb-4">
                        Siap Memulai Perjalanan Anda?
                    </h2>
                    <p class="mb-8">
                        Dapatkan Mobil Sewa Anda dengan Harga Terbaik dan Layanan<br>
                        terlengkap. Tunggu Apalagi, Pesan Sekarang!
                    </p>
                    <button
                        class="bg-white text-[#038EFF] px-8 py-3 rounded-[14px] hover:shadow-lg transition duration-300 w-[200px] h-[52px]">
                        <a href="{{ route('car.list') }}">Sewa Sekarang! </a>
                    </button>
                </div>
            </section>
    </main>
@endsection
