<!-- start: Sidebar -->
<div class="fixed left-0 top-0 w-64 h-full bg-gray-900 p-4 z-50 sidebar-menu transition-transform">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
        <span class="text-lg font-bold text-white ml-3">Doa Ibu</span>
    </a>
    <ul class="mt-5">
        <li class="mb-1 group {{ Route::is('admin.home') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mb-1 group {{ Route::is('products.index') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <span class="text-sm">Daftar Mobil</span>
            </a>
        </li>
        <li class="mb-1 group {{ Route::is('admin.permintaan') ? 'active' : '' }}">
            <a href="{{ route('admin.permintaan') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <span class="text-sm">Permintaan Penyewaan</span>
            </a>
        </li>
        <li class="mb-1 group {{ Route::is('admin.penyewaan') ? 'active' : '' }}">
            <a href="{{ route('admin.penyewaan') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <span class="text-sm">Penyewaan</span>
            </a>
        </li>
        <li class="mb-1 group {{ Route::is('admin.pembayaran') ? 'active' : '' }}">
            <a href="{{ route('admin.pembayaran') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                <span class="text-sm">Pembayaran</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" onclick="confirmLogout(event)" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <span class="text-sm">Logout</span>
            </a>
        </li>
    </ul>    
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->
