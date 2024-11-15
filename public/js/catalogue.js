document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterForm');
    const carGrid = document.getElementById('carGrid');
    const searchInput = document.querySelector('input[placeholder="Cari Mobil"]');
    const kapasitasButtons = document.querySelectorAll('.kapasitas-btn');
    const testFiltersBtn = document.getElementById('testFiltersBtn');
    
    // Handle kapasitas button clicks
    kapasitasButtons.forEach(button => {
        button.addEventListener('click', function() {
            kapasitasButtons.forEach(btn => btn.classList.remove('bg-[#038EFF]', 'text-white'));
            this.classList.add('bg-[#038EFF]', 'text-white');
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