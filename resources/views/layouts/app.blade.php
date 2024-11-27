<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="h-screen flex bg-gray-50">
    <!-- Sidebar with Header Elements -->
    <aside class="bg-gray-800 text-white w-20 flex flex-col items-center pt-6 space-y-8">
        <!-- Profile Picture -->
        <div class="flex flex-col items-center space-y-2">
            <img src="https://i.pinimg.com/736x/a0/1e/6f/a01e6fa95f54f561303a558adf40a721.jpg" alt="Profile"
                class="w-12 h-12 rounded-full border-2 border-white shadow-xl">
        </div>

        <!-- Navigation Links -->
        <div class="flex flex-col space-y-4 items-center">
            <a href="{{ route('admin/home') }}" class="text-white hover:bg-gray-700 p-3 rounded-full w-16 flex flex-col items-center transition duration-300 ease-in-out transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9-2v8m4 4h6a2 2 0 002-2v-5a2 2 0 00-.586-1.414L13 3a2 2 0 00-2.828 0L3.586 9.586A2 2 0 003 11v1m9 4h2" />
                </svg>
                <span class="text-xs hidden md:block">Home</span>
            </a>
            <a href="{{ route('products.index') }}" class="text-white hover:bg-gray-700 p-3 rounded-full w-16 flex flex-col items-center transition duration-300 ease-in-out transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l1.5-4.5a2 2 0 012-1.5h7a2 2 0 012 1.5L19 11m-14 0h14m-14 0l-.5 4.5a2 2 0 002 2h11a2 2 0 002-2L19 11M5 11h14M6 16h.01M18 16h.01" />
                </svg>
                <span class="text-xs hidden md:block">Products</span>
            </a>
            <a href="/metode_pembayaran" class="text-white hover:bg-gray-700 p-3 rounded-full w-16 flex flex-col items-center transition duration-300 ease-in-out transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M3 6c0 4 18 4 18 0M3 6v12m18 0V6m0 12c0 4-18 4-18 0" />
                </svg>
                <span class="text-xs text-center hidden md:block">Metode Pembayaran</span>
            <a href="/pembayaran" class="text-white hover:bg-gray-700 p-3 rounded-full w-16 flex flex-col items-center transition duration-300 ease-in-out transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C7.03 2 3 6.03 3 11s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm-1 12v-4h2v4h-2zm0-6V7h2v1h-2z"/>
                </svg>
                <span class="text-xs text-center hidden md:block">Pembayaran</span>
            </a>
            <a href="/penyewaan" class="text-white hover:bg-gray-700 p-3 rounded-full w-16 flex flex-col items-center transition duration-300 ease-in-out transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19h14" />
                </svg>
                <span class="text-xs hidden md:block">Penyewaan</span>
            </a>
            <!-- Logout link with SweetAlert2 confirmation -->
            <a href="#" onclick="confirmLogout(event)" class="text-white hover:bg-red-600 p-3 rounded-full w-16 flex flex-col items-center transition duration-300 ease-in-out transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4V4" />
                </svg>
                <span class="text-xs hidden md:block">Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex flex-col w-full">
        <!-- Top Bar with Title -->
        <header class="bg-gray-800 text-white p-4 flex items-center justify-between">
            <h1 class="text-xl font-bold">SISTEM RENTAL</h1>
        </header>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div>@yield('contents')</div>
        </main>
    </div>

    <script>
        // Function to show SweetAlert2 logout confirmation dialog
        function confirmLogout(event) {
            event.preventDefault(); // Prevent default anchor behavior
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        }
    </script>
</body>
</html>