@extends('layouts.user') 
@section('title', 'Daftar Mobil')

@section('contents')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-betweens gap-3 mb-8">
        <!-- Heading -->
        <img src="assets/img/daftarMobil.png" alt="">
        <h2 class="text-2xl font-bold">Daftar Mobil</h2>

        <!-- Search Bar -->
        <form class="flex-grow max-w-md">   
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
                    class="block w-full p-4 ps-10 pe-24 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Cari Mobil..." 
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
  
    <div class="flex gap-8">
        <!-- Sidebar Filters -->
        <div class="w-64">
            <div class="space-y-6">
                <!-- Sidebar Filters -->
                <form id="filterForm" class="space-y-6">
                    <!-- Model Filter -->
                    <div class="pb-6 border-b border-[#1F1F1F]/12">
                        <h3 class="font-semibold mb-3">Model</h3>
                        <div class="space-y-2">
                            @foreach(['SUV', 'Sedan', 'Luxury', 'Electric'] as $model)
                                <label class="flex items-center">
                                    <input type="checkbox" 
                                        name="model[]" 
                                        value="{{ $model }}"
                                        class="filter-checkbox w-4 h-4 rounded bg-[#F6F8F9] border-[#B0BABF] border text-[#038EFF] 
                                                focus:ring-[#038EFF] checked:bg-[#038EFF] checked:border-[#038EFF]">
                                    <span class="ml-2">{{ $model }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Transmisi Filter -->
                    <div class="pb-6 border-b border-[#1F1F1F]/12">
                        <h3 class="font-semibold mb-3">Transmisi</h3>
                        <div class="space-y-2">
                            @foreach(['Manual', 'Matic'] as $transmisi)
                                <label class="flex items-center">
                                    <input type="checkbox" 
                                        name="transmisi[]" 
                                        value="{{ strtolower($transmisi) }}"
                                        class="filter-checkbox w-4 h-4 rounded bg-[#F6F8F9] border-[#B0BABF] border text-[#038EFF] 
                                                focus:ring-[#038EFF] checked:bg-[#038EFF] checked:border-[#038EFF]">
                                    <span class="ml-2">{{ $transmisi }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Kapasitas Filter -->
                    <div class="pb-5 border-b border-[#1F1F1F]/12">
                        <h3 class="font-semibold mb-3">Kapasitas</h3>
                        <div class="flex gap-2" id="kapasitasButtons">
                            @foreach([2, 4, 6] as $kapasitas)
                                <button type="button" 
                                    class="kapasitas-btn w-12 h-8 rounded bg-gray-100 hover:bg-gray-200 transition-colors"
                                    data-kapasitas="{{ $kapasitas }}">
                                    {{ $kapasitas }}
                                </button>
                            @endforeach
                            <input type="hidden" name="kapasitas" id="selectedKapasitas">
                        </div>
                    </div>

                    <!-- Harga Filter -->
                    <div class="pb-5">
                        <h3 class="font-semibold mb-3">Harga Sewa (Rp)</h3>
                        <div class="space-y-2">
                            <input type="number" 
                                name="min_harga" 
                                placeholder="Min" 
                                class="filter-input w-full px-3 py-2 rounded border focus:ring-[#038EFF] focus:border-[#038EFF]">
                            <input type="number" 
                                name="max_harga" 
                                placeholder="Max" 
                                class="filter-input w-full px-3 py-2 rounded border focus:ring-[#038EFF] focus:border-[#038EFF]">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Car Grid -->
        <div id="carGrid" class="flex-1 grid grid-cols-3 gap-6">
            @include('components.car-grid', ['cars' => $cars])
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterForm');
    const carGrid = document.getElementById('carGrid');
    const searchInput = document.querySelector('input[placeholder="Cari Mobil"]');
    const kapasitasButtons = document.querySelectorAll('.kapasitas-btn');
    const testFiltersBtn = document.getElementById('testFiltersBtn');
    
    kapasitasButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Reset semua tombol kapasitas
            kapasitasButtons.forEach(btn => {
                btn.classList.remove('bg-gradient-button', 'text-white');
                btn.classList.add('bg-gray-100'); // Reset warna abu-abu
            });
            
            // Tambahkan gradien pada tombol yang diklik
            this.classList.remove('bg-gray-100');
            this.classList.add('gradient-button', 'text-white');
            document.getElementById('selectedKapasitas').value = this.dataset.kapasitas;
            
            updateResults();
        });
    });

    // Handle filter changes
    const filterInputs = document.querySelectorAll('.filter-checkbox, .filter-input');
    filterInputs.forEach(input => {
        input.addEventListener('change', updateResults);
    });

    // Handle search
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(updateResults, 500);
    });

    // Handle the "Test Filters" button click
    testFiltersBtn.addEventListener('click', function() {
        // Optionally, you can pre-set some filter values here for testing
        // Example: Pre-select a model and capacity
        document.querySelector('input[name="model[]"]').checked = true;
        document.querySelector('input[name="transmisi[]"]').checked = true;
        document.getElementById('selectedKapasitas');
        
        updateResults();
    });

    function updateResults() {
        const formData = new URLSearchParams();
        
        // Tambahkan nilai search hanya jika ada
        const searchValue = document.querySelector('input[placeholder="Cari Mobil"]').value.trim();
        if (searchValue) {
            formData.append('search', searchValue);
        }

        // Ambil nilai dari form filter
        const filters = new FormData(filterForm);
        
        // Append filter values yang tidak kosong
        filters.forEach((value, key) => {
            if (value !== '' && value !== null && value !== undefined) {
                formData.append(key, value);
            }
        });

        // Debug: Log filter yang aktif
        console.log('Active filters:', Object.fromEntries(formData));

        // Kirim request
        fetch(`{{ route('car.filter') }}?${formData.toString()}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            carGrid.innerHTML = data.html;
            
            // Optional: Tampilkan jumlah hasil filter
            console.log(`Found ${data.count} matching cars`);
            console.log('Applied filters:', data.filters_applied);
        })
        .catch(error => {
            console.error('Error:', error);
            carGrid.innerHTML = `
                <div class="col-span-3 text-center py-8">
                    <p class="text-red-500">Terjadi kesalahan saat memuat data.</p>
                </div>
            `;
        });
    }
});
</script>
@endpush
@endsection