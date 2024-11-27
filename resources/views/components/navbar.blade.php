<div>
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-[#038EFF] font-bold text-xl">
                        LOGO DOA IBU
                    </a>
                </div>

                <!-- Navigation Bar -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="{{ Request::is('/') ? 'font-medium text-[#038EFF]' : 'text-gray-700' }} hover:text-[#038EFF] px-3 py-2 text-sm transition duration-150">
                        Home
                    </a>
                    <a href="/tentang-kami" class="{{ Request::is('tentang-kami') ? 'font-medium text-[#038EFF]' : 'text-gray-700' }} hover:text-[#038EFF] px-3 py-2 text-sm transition duration-150">
                        Tentang Kami
                    </a>
                    <a href="/daftar-mobil" class="{{ Request::is('daftar-mobil') ? 'font-medium text-[#038EFF]' : 'text-gray-700' }} hover:text-[#038EFF] px-3 py-2 text-sm transition duration-150">
                        Daftar Mobil
                    </a>
                    <a href="/syarat-ketentuan" class="{{ Request::is('syarat-ketentuan') ? 'font-medium text-[#038EFF]' : 'text-gray-700' }} hover:text-[#038EFF] px-3 py-2 text-sm transition duration-150">
                        Syarat & Ketentuan
                    </a>
                    <a href="/hubungi-kami" class="{{ Request::is('hubungi-kami') ? 'font-medium text-[#038EFF]' : 'text-gray-700' }} hover:text-[#038EFF] px-3 py-2 text-sm transition duration-150">
                        Hubungi Kami
                    </a>

                     <!-- Button Pesan Sekarang hanya tampil saat belum login -->
                    @guest
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
                    @endguest

                    <!-- Profile menu hanya tampil saat login -->
                    @auth
                    <div x-data="{show: false}" x-on:click.away="show = false" class="ml-3 relative">
                        <button x-on:click="show = !show" type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">dropdown-admin</span>
                            <img class="h-8 w-8 rounded-full" src="https://i.pinimg.com/564x/71/0c/37/710c37e50568b4df2131f4470075224a.jpg" alt="User Profile">
                        </button>
                        <div x-show="show" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Riwayat Transaksi</a>
                            <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-2" id="user-menu-item-2">Keluar</a>
                        </div>
                        
                    </div>
                    @endauth
                    </div>    
                </div>
            </div>
        </div>
    </nav>
</div>