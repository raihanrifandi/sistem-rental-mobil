<!-- start: Sidebar -->
<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <!-- Header Sidebar -->
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-8 h-8 rounded-full object-cover">
        <span class="text-lg font-bold text-white ml-3">Doa Ibu</span>
    </a>

    <!-- Menu Sidebar -->
    <ul class="mt-5">
        <!-- Dashboard Link -->
        <li class="mb-1 group {{ Route::is('admin.home') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9-2v8m4 4h6a2 2 0 002-2v-5a2 2 0 00-.586-1.414L13 3a2 2 0 00-2.828 0L3.586 9.586A2 2 0 003 11v1m9 4h2" />
                </svg>
                <span class="text-sm ml-3">Dashboard</span>
            </a>
        </li>

        <!-- Daftar Mobil Link -->
        <li class="mb-1 group {{ Route::is('products.index') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l1.5-4.5a2 2 0 012-1.5h7a2 2 0 012 1.5L19 11m-14 0h14m-14 0l-.5 4.5a2 2 0 002 2h11a2 2 0 002-2L19 11M5 11h14M6 16h.01M18 16h.01" />
                </svg>
                <span class="text-sm ml-3">Daftar Mobil</span>
            </a>
        </li>

        <!-- Permintaan Penyewaan Link -->
        <li class="mb-1 group {{ Route::is('admin.permintaan') ? 'active' : '' }}">
            <a href="{{ route('admin.permintaan') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M3 6c0 4 18 4 18 0M3 6v12m18 0V6m0 12c0 4-18 4-18 0" />
                </svg>
                <span class="text-sm ml-3">Permintaan Penyewaan</span>
            </a>
        </li>

        <!-- Penyewaan Link -->
        <li class="mb-1 group {{ Route::is('admin.penyewaan') ? 'active' : '' }}">
            <a href="{{ route('admin.penyewaan') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C7.03 2 3 6.03 3 11s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm-1 12v-4h2v4h-2zm0-6V7h2v1h-2z"/>
                </svg>
                <span class="text-sm ml-3">Penyewaan</span>
            </a>
        </li>

        <!-- Pembayaran Link -->
        <li class="mb-1 group {{ Route::is('admin.pembayaran') ? 'active' : '' }}">
            <a href="{{ route('admin.pembayaran') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19h14" />
                </svg>
                <span class="text-sm ml-3">Pembayaran</span>
            </a>
        </li>

        <!-- Logout Link -->
        <li class="mb-1 group">
            <a href="#" onclick="confirmLogout(event)" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4V4" />
                </svg>
                <span class="text-sm ml-3">Logout</span>
            </a>
        </li>
    </ul>
</div>

<!-- Sidebar Overlay -->
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->
