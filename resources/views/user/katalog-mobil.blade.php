@extends('layouts.user') 
@section('title', 'Daftar Mobil')

@section('contents')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-betweens gap-3 mb-8">
        <!-- Heading -->
        <img src="assets/img/daftarMobil.png" alt="">
        <h2 class="text-2xl font-bold">Daftar Mobil</h2>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('car.list') }}" class="flex-grow max-w-md">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <!-- Icon di sisi kiri -->
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <!-- Input Field -->
                <input 
                    type="search" 
                    id="default-search" 
                    name="search"
                    class="block w-full p-4 ps-10 pe-24 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Cari Mobil..." 
                    value="{{ request('search') }}" 
                    required 
                />
                <!-- Tombol di dalam field -->
                <button 
                    type="submit" 
                    class="absolute end-2 top-2.5 text-white bg-gradient-to-b from-[#65BAFF] to-[#038EFF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[4px] text-sm px-4 py-2"
                >
                    Search
                </button>
            </div>
        </form>        
    </div>

    <!-- Car Grid -->
    <div id="carGrid" class="flex-1 grid grid-cols-3 gap-6">
        @include('components.car-grid', ['cars' => $cars])
    </div>
</div>
@endsection
