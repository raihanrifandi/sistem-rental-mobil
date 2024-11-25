document.addEventListener('DOMContentLoaded', () => {
    const paymentButton = document.getElementById('paymentButton');
    const confirmationModal = document.getElementById('confirmationModal');
    const cancelButton = document.getElementById('cancelButton');

    // Tampilkan modal ketika tombol bayar ditekan
    paymentButton.addEventListener('click', (e) => {
        e.preventDefault();
        confirmationModal.classList.remove('hidden');
    });

    // Sembunyikan modal ketika tombol batal ditekan
    cancelButton.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
    });
});