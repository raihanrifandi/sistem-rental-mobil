let isAddModalOpen = false;
let isEditModalOpen = false;

function showToast(message, type) {
    const toastContainer = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    
    toast.className = `flex items-center p-4 mb-4 w-full max-w-xs text-white rounded-lg shadow-lg ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;
    toast.innerHTML = `
        <div class="ml-3 text-sm font-medium">${message}</div>
        <button onclick="removeToast(this)" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-700 hover:text-gray-900 rounded-full focus:ring-2 focus:ring-gray-300 p-1 inline-flex h-8 w-8 dark:text-white dark:hover:text-gray-300 dark:bg-gray-800" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    `;

    toastContainer.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000); 
}

function removeToast(button) {
    button.parentElement.remove();
}


function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
    isAddModalOpen = true;
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
    isAddModalOpen = false;
}

function openEditModal(button) {
    isEditModalOpen = true;

    // Ambil nilai dari atribut data- pada tombol yang diklik
    const product = {
        id_mobil: button.getAttribute('data-id_mobil'),
        merk: button.getAttribute('data-merk'),
        model: button.getAttribute('data-model'),
        tahun: button.getAttribute('data-tahun'),
        transmisi: button.getAttribute('data-transmisi'),
        kapasitas: button.getAttribute('data-kapasitas'),
        plat: button.getAttribute('data-plat'),
        harga_sewa: button.getAttribute('data-harga_sewa')
    };

    // Set nilai input form modal dengan data produk yang dipilih
    document.getElementById('editForm').action = '/products/' + product.id_mobil;
    document.getElementById('productId').value = product.id_mobil;
    document.getElementById('merk').value = product.merk;
    document.getElementById('model').value = product.model;
    document.getElementById('tahun').value = product.tahun;
    document.getElementById('plat').value = product.plat;
    document.getElementById('transmisi').value = product.transmisi;
    document.getElementById('kapasitas').value = product.kapasitas;
    document.getElementById('harga_sewa').value = product.harga_sewa;

    document.getElementById('editModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
    isEditModalOpen = false;
}

window.addEventListener('load', function() {
    if (!isAddModalOpen) {
            document.getElementById('addModal').classList.add('hidden');
    }

    if (!isEditModalOpen) {
            document.getElementById('editModal').classList.add('hidden');
    }
});

