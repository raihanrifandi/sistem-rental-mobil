@extends('layouts.user') 
@section('title', 'Katalog Mobil')

@section('contents')
<div class="container mx-auto p-6">
    <!-- Heading dan Search -->
    <div class="flex items-center justify-between gap-3 mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Katalog Mobil</h2>

        <!-- Search -->
        <form action="{{ route('car.list') }}" method="GET" class="flex items-center gap-3">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari mobil..." 
                class="border rounded-md px-4 py-2 w-80 focus:ring focus:ring-blue-200 focus:outline-none transition-all ease-in-out duration-300 shadow-md hover:shadow-lg">
            <button 
                type="submit" 
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-200 shadow-md">
                Cari
            </button>
        </form>
    </div>

    <!-- Filter -->
    <div class="mb-8 flex gap-6 flex-wrap justify-start">
        <form action="{{ route('car.list') }}" method="GET" class="flex items-center gap-4 w-full sm:w-auto">
            <!-- Filter Merk -->
            <div class="relative">
                <select name="merk" 
                    class="block w-full appearance-none border rounded-md px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none transition-all ease-in-out duration-300 shadow-md hover:shadow-lg pr-10">
                    <option value="">Pilih Merk</option>
                    @foreach ($cars->unique('merk') as $car)
                        <option value="{{ $car->merk }}" {{ request('merk') == $car->merk ? 'selected' : '' }}>{{ $car->merk }}</option>
                    @endforeach
                </select>
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </span>
            </div>

            <!-- Filter Tahun -->
            <div class="relative">
                <select name="tahun" 
                    class="block w-full appearance-none border rounded-md px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none transition-all ease-in-out duration-300 shadow-md hover:shadow-lg pr-10">
                    <option value="">Pilih Tahun</option>
                    @foreach ($cars->unique('tahun') as $car)
                        <option value="{{ $car->tahun }}" {{ request('tahun') == $car->tahun ? 'selected' : '' }}>{{ $car->tahun }}</option>
                    @endforeach
                </select>
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </span>
            </div>

            <!-- Filter Transmisi -->
            <div class="relative">
                <select name="transmisi" 
                    class="block w-full appearance-none border rounded-md px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none transition-all ease-in-out duration-300 shadow-md hover:shadow-lg pr-10">
                    <option value="">Pilih Transmisi</option>
                    <option value="manual" {{ request('transmisi') == 'manual' ? 'selected' : '' }}>Manual</option>
                    <option value="matic" {{ request('transmisi') == 'matic' ? 'selected' : '' }}>Matic</option>
                </select>
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </span>
            </div>

            <!-- Filter Kapasitas -->
            <div class="relative">
                <select name="kapasitas" 
                    class="block w-full appearance-none border rounded-md px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none transition-all ease-in-out duration-300 shadow-md hover:shadow-lg pr-10">
                    <option value="">Pilih Kapasitas</option>
                    @foreach ($cars->unique('kapasitas') as $car)
                        <option value="{{ $car->kapasitas }}" {{ request('kapasitas') == $car->kapasitas ? 'selected' : '' }}>{{ $car->kapasitas }} Orang</option>
                    @endforeach
                </select>
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fas fa-chevron-down text-gray-400"></i>
                </span>
            </div>

            <button 
                type="submit" 
                class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition-colors duration-200 shadow-md">
                Terapkan
            </button>
        </form>
    </div>

    <!-- Car Grid -->
    <div id="carGrid" class="flex-1 grid grid-cols-3 gap-6">
        @include('components.car-grid', ['cars' => $cars])
    </div>
</div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $cars->links() }}
    </div>
</div>
@endsection
