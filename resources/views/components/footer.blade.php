<footer class="bg-gray-900 text-white py-16 mt-12">
    <div class="container mx-auto px-6 md:px-12 lg:px-20">
        <!-- Footer Content Wrapper -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Logo and Description -->
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <!-- Gambar Logo -->
                    <img src="assets/img/logo.png" alt="Logo" class="h-12 w-12">
                    <h3 class="text-xl font-semibold">
                        DOA IBU <span class="text-blue-500">RENTAL</span>
                    </h3>
                </div>
                
                <p class="text-gray-400 text-sm mb-6">
                    RentalYukk adalah sebuah platform web yang menyediakan layanan sewa mobil dengan kemudahan, keamanan, dan harga yang kompetitif.
                </p>
                <!-- Social Links -->
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-500 transition">
                        <img src="../../assets/img/whatsapp.png" alt="WhatsApp" class="w-6 h-6">
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-500 transition">
                        <img src="../../assets/img/mail.png" alt="Email" class="w-6 h-6">
                    </a>
                </div>
            </div>
            <!-- menu -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Menu</h4>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-blue-500 transition">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('tentangkami') }}" class="text-gray-400 hover:text-blue-500 transition">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('car.list') }}" class="text-gray-400 hover:text-blue-500 transition">Daftar Mobil</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-blue-500 transition">Syarat &amp; Ketentuan</a>
                    </li>
                </ul>
            </div>
            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Contact</h4>
                <p class="text-gray-400 text-sm mb-4">(208) 555-0112</p>
                <p class="text-gray-400 text-sm mb-4">doaiburentalcar@gmail.com</p>
                <p class="text-gray-400 text-sm">
                    Rehan<br>dengan doa ibu
                </p>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="border-t border-gray-700 text-center mt-12 pt-6">
            <p class="text-gray-500 text-sm">
                © 2024 Kelompok doa ibu rental PWL - All Rights Reserved
            </p>
        </div>
    </div>
</footer>
