<!-- start: Sidebar -->
<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform max-w-full overflow-hidden">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="../../assets/img/logo.png" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-white ml-3">Doa Ibu Rental</span>
    </a>
    <ul class="mt-5">
        <li class="mb-1 group {{ Route::is('admin.home') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <!-- Ikon Home -->
                <svg class="w-5 h-5 mr-3 text-gray-300 group-hover:text-gray-100 group-[.active]:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                </svg>
                <!-- Teks menu -->
                <span class="text-sm">Dashboard</span>
            </a>
        </li>

        <li class="mb-1 group {{ Route::is('products.index') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <!-- Ikon Daftar Mobil -->
                <svg class="w-5 h-5 mr-3 text-gray-300 group-hover:text-gray-100 group-[.active]:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                </svg>
                <!-- Teks menu -->
                <span class="text-sm">Daftar Mobil</span>
            </a>
        </li>

        <li class="mb-1 group {{ Route::is('admin.permintaan') ? 'active' : '' }}">
            <a href="{{ route('admin.permintaan') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <!-- Ikon Permintaan Penyewaan -->
                <svg class="w-5 h-5 mr-3 text-gray-300 group-hover:text-gray-100 group-[.active]:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 6a3 3 0 1 1 4 2.83v6.34a3.001 3.001 0 1 1-2 0V8.83A3.001 3.001 0 0 1 3 6Zm11.207-2.707a1 1 0 0 1 0 1.414L13.914 5H15a4 4 0 0 1 4 4v6.17a3.001 3.001 0 1 1-2 0V9a2 2 0 0 0-2-2h-1.086l.293.293a1 1 0 0 1-1.414 1.414l-2-2a1 1 0 0 1 0-1.414l2-2a1 1 0 0 1 1.414 0Z" clip-rule="evenodd"/>
                </svg>
                <!-- Teks menu -->
                <span class="text-sm">Permintaan Penyewaan</span>
            </a>
        </li>

        <li class="mb-1 group {{ Route::is('admin.penyewaan') ? 'active' : '' }}">
            <a href="{{ route('admin.penyewaan') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <!-- Ikon Penyewaan -->
                <svg class="w-5 h-5 mr-3 text-gray-300 group-hover:text-gray-100 group-[.active]:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 3a1 1 0 0 0 0 2h.687L7.82 15.24A3 3 0 1 0 11.83 17h2.34A3 3 0 1 0 17 15H9.813l-.208-1h8.145a1 1 0 0 0 .979-.796l1.25-6A1 1 0 0 0 19 6h-2.268A2 2 0 0 1 15 9a2 2 0 1 1-4 0 2 2 0 0 1-1.732-3h-1.33L7.48 3.796A1 1 0 0 0 6.5 3H5Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M14 5a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1a1 1 0 1 0 2 0V8h1a1 1 0 1 0 0-2h-1V5Z" clip-rule="evenodd" />
                </svg>
                <!-- Teks menu -->
                <span class="text-sm">Penyewaan</span>
            </a>
        </li>

        <li class="mb-1 group {{ Route::is('admin.pembayaran') ? 'active' : '' }}">
            <a href="{{ route('admin.pembayaran') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <!-- Ikon Pembayaran -->
                <svg class="w-5 h-5 mr-3 text-gray-300 group-hover:text-gray-100 group-[.active]:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 3a1 1 0 0 0 0 2h.687L7.82 15.24A3 3 0 1 0 11.83 17h2.34A3 3 0 1 0 17 15H9.813l-.208-1h8.145a1 1 0 0 0 .979-.796l1.25-6A1 1 0 0 0 19 6h-2.268A2 2 0 0 1 15 9a2 2 0 1 1-4 0 2 2 0 0 1-1.732-3h-1.33L7.48 3.796A1 1 0 0 0 6.5 3H5Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M14 5a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1a1 1 0 1 0 2 0V8h1a1 1 0 1 0 0-2h-1V5Z" clip-rule="evenodd" />
                </svg>
                <!-- Teks menu -->
                <span class="text-sm">Pembayaran</span>
            </a>
        </li>

        <li class="mb-1 group">
            <a href="#" onclick="confirmLogout(event)" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <svg class="w-6 h-6 text-white mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                </svg>
                <span class="text-sm">Logout</span>
            </a>
        </li>
    </ul>    
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->
