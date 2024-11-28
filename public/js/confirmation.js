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

document.addEventListener("DOMContentLoaded", function () {
    const dateInput = document.getElementById("tanggal_mulai");
    const timeInput = document.getElementById("waktu_penjemputan");
    const timeWarning = document.getElementById("time-warning");

    function validatePickupTime() {
    const now = new Date();
    const selectedDate = new Date(dateInput.value);
    const selectedTime = timeInput.value;

    // Ambil jam dan menit dari waktu input
    const [selectedHour, selectedMinute] = selectedTime.split(':').map(Number);

    // Rentang jam operasional
    const openingHour = 6;
    const closingHour = 23;

    // Hitung waktu minimal (3 jam dari sekarang, hanya berlaku untuk hari ini)
    const minTime = new Date();
    minTime.setHours(now.getHours() + 3, now.getMinutes(), 0);

    // Debug logs
    console.log("Waktu sekarang:", now.toTimeString());
    console.log("Tanggal dipilih:", selectedDate.toDateString());
    console.log("Waktu dipilih:", selectedHour, selectedMinute);
    console.log("Min time:", minTime.toTimeString());

    // Logika validasi
    let isValid = false;

    if (selectedDate.toDateString() === now.toDateString()) {
        // Jika tanggalnya hari ini, validasi harus 3 jam dari sekarang dan sesuai jam operasional
        isValid =
        (selectedHour > minTime.getHours() ||
            (selectedHour === minTime.getHours() && selectedMinute >= minTime.getMinutes())) &&
        selectedHour >= openingHour &&
        selectedHour < closingHour;
    } else if (selectedDate > now) {
        // Jika tanggalnya di masa depan (besok atau lebih), cukup validasi jam operasional
        isValid = selectedHour >= openingHour && selectedHour < closingHour;
    }

    console.log("Valid:", isValid);

    // Handle validasi dan styling
    if (!isValid) {
        timeWarning.classList.remove("hidden");
        timeInput.classList.add("border-red-500", "focus:ring-red-500", "focus:border-red-500");
    } else {
        timeWarning.classList.add("hidden");
        timeInput.classList.remove("border-red-500", "focus:ring-red-500", "focus:border-red-500");
    }
    }

    function initializeDate() {
    const now = new Date();
    const formattedToday = now.toISOString().split('T')[0];
    dateInput.min = formattedToday; // Minimal hari ini
    dateInput.value = formattedToday; // Default ke hari ini
    }

    // Event Listeners
    dateInput.addEventListener("change", validatePickupTime);
    timeInput.addEventListener("input", validatePickupTime);

    // Inisialisasi
    initializeDate();
});
