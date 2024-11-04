<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</head>
<body>
    <div>
        <nav class="bg-white shadow-sm sticky top-0 z-50">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Logo and Brand -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-[#038EFF] font-bold text-xl">
                            LOGO
                        </a>
                    </div>
        
                    <!-- Navigation Links - Desktop -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="/" class="text-[#038EFF] hover:text-[#65BAFF] px-3 py-2 text-sm font-medium transition duration-150">
                            Home
                        </a>
                        <a href="/tentang-kami" class="text-gray-700 hover:text-[#038EFF] px-3 py-2 text-sm font-medium transition duration-150">
                            Tentang Kami
                        </a>
                        <a href="/daftar-mobil" class="text-gray-700 hover:text-[#038EFF] px-3 py-2 text-sm font-medium transition duration-150">
                            Daftar Mobil
                        </a>
                        <a href="/syarat-ketentuan" class="text-gray-700 hover:text-[#038EFF] px-3 py-2 text-sm font-medium transition duration-150">
                            Syarat & Ketentuan
                        </a>
                        <a href="/hubungi-kami" class="text-gray-700 hover:text-[#038EFF] px-3 py-2 text-sm font-medium transition duration-150">
                            Hubungi Kami
                        </a>
                        <form action="{{ route('login') }}" method="GET">
                            <button 
                                type="submit" 
                                class="bg-gradient-to-b from-[#65BAFF] to-[#038EFF] text-white px-6 py-2 rounded-lg text-sm font-medium hover:shadow-lg transition duration-300 flex items-center space-x-2 w-[186px] h-[54px]"
                            >
                                <span>Pesan Sekarang</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="white" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
        <main>
            <div>
                <div>@yield('contents')</div>
            </div>
        </main>
    <script>
        AOS.init();
    </script>
</body>
</html>