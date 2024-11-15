@extends('layouts.user')
@section('title', 'Profile')

@section('contents')
<main class="flex justify-center items-center py-10 bg-gray-100 min-h-screen relative">

    <!-- Background Setengah -->
    <div class="absolute top-0 left-0 right-0 h-1/2">
        <div class="absolute inset-0 bg-cover bg-center opacity-100"
            style="background-image: url('https://4.bp.blogspot.com/-m4aLgUfnUQk/WVxcoSqKe0I/AAAAAAAADo8/4iFRgHnneC89YKt5MuckIqc8TKjsFJzLQCLcBGAs/s1600/Wallpaper%2BKeren%2BMobil%2BSupercar%2B8%2B%25281%2529.jpg');">
        </div>
        <!-- Overlay Biru -->
        <div class="absolute inset-0 bg-[#038EFF] bg-opacity-70"></div>
    </div>

    <div class="relative bg-white shadow-lg rounded-lg w-full max-w-4xl overflow-hidden">

        @if(session('error'))
        <div class="alert alert-danger bg-red-500 text-white p-3 rounded">
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success bg-green-500 text-white p-3 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Header dan Foto Profil -->
        <div class="flex flex-col md:flex-row">
            <!-- Foto Profil -->
            <div class="w-full md:w-1/3 bg-gray-200">
                <img class="w-full h-full object-cover" src="https://i.pinimg.com/564x/71/0c/37/710c37e50568b4df2131f4470075224a.jpg" alt="Profile Image">
            </div>

            <!-- Info Pribadi -->
            <div class="w-full md:w-2/3 p-6">
                <div class="flex items-center space-x-2">
                    <span class="bg-[#038EFF] text-white text-xs px-2 py-1 rounded">HALO</span>
                    <h1 class="text-2xl font-bold">Saya {{$user->name}}</h1>
                </div>
                <p class="text-gray-600 text-sm mt-1">Pelanggan Setia Doa Ibu Rental</p>

                <div class="mt-4">
                    <h1 class="text-2xl font-bold mb-4">Profil</h1>

                    <p class="text-gray-600 mt-1"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="text-gray-600 mt-1"><strong>Telepon:</strong> {{ $user->phone ?? 'Belum Diberikan' }}</p>
                    <p class="text-gray-600 mt-1"><strong>Nomor SIM:</strong> {{ $user->license_number ?? 'Belum Diberikan' }}</p>
                    <p class="text-gray-600 mt-1"><strong>Total Penyewaan:</strong> {{ $user->rental_count ?? '0' }} mobil</p>
                    <p class="text-gray-600 mt-1"><strong>Profil Diperbarui:</strong> {{ $user->updated_at->format('d F Y') }}</p>

                    <!-- Tombol Edit Profil -->
                    <button onclick="openModal()" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Edit Profil</button>
                </div>
            </div>
        </div>

        <div class="bg-[#038EFF] py-4 flex justify-center space-x-4"></div>
    </div>

    <!-- Modal Edit Profil -->
    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg w-96 p-6 relative">
            <h2 class="text-xl font-bold mb-4">Edit Profil</h2>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="w-full border-gray-300 rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="w-full border-gray-300 rounded p-2">
                </div>

                <!-- <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Password Lama</label>
                    <input type="password" name="current_password" class="w-full border-gray-300 rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Password Baru</label>
                    <input type="password" name="new_password" class="w-full border-gray-300 rounded p-2">
                </div> -->

                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function openModal() {
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection