<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.5.0/dist/flowbite.min.css" rel="stylesheet">
    <link rel="icon" href="assets/img/logo.png">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="h-screen flex bg-gray-50">

    <aside class="w-64 bg-gray-800 text-white h-screen" aria-label="Sidebar">
        <div class="overflow-y-auto py-4 px-3">
            <!-- Profile Section -->
            <div class="flex items-center flex-col space-y-2 mb-4">
                <img src="https://i.pinimg.com/736x/db/c7/a3/dbc7a32b8042d6757b7b69f1e9b43325.jpg" alt="Profile Picture"
                    class="w-12 h-12 rounded-full border border-white shadow">
            </div>

            <!-- Navigation Links -->
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.home') }}"
                        class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-300 transition duration-75 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7m-9-2v8m4 4h6a2 2 0 002-2v-5a2 2 0 00-.586-1.414L13 3a2 2 0 00-2.828 0L3.586 9.586A2 2 0 003 11v1m9 4h2">
                            </path>
                        </svg>
                        <span class="ml-3">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"
                        class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-300 transition duration-75 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 11l1.5-4.5a2 2 0 012-1.5h7a2 2 0 012 1.5L19 11m-14 0h14m-14 0l-.5 4.5a2 2 0 002 2h11a2 2 0 002-2L19 11M5 11h14M6 16h.01M18 16h.01">
                            </path>
                        </svg>
                        <span class="ml-3">Products</span>
                    </a>
                </li>
                <li>
                    <a href="/metode_pembayaran"
                        class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-300 transition duration-75 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 6h18M3 6c0 4 18 4 18 0M3 6v12m18 0V6m0 12c0 4-18 4-18 0"></path>
                        </svg>
                        <span class="ml-3">Metode Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="/penyewaan"
                        class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-300 transition duration-75 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 11l7-7 7 7M5 19h14"></path>
                        </svg>
                        <span class="ml-3">Penyewaan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('validasi.penyewaan') }}"
                        class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-gray-700">
                        <svg class="w-6 h-6 text-gray-300 transition duration-75 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 11l7-7 7 7M5 19h14"></path>
                        </svg>
                        <span class="ml-3">Request Penyewaan</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="confirmLogout(event)"
                        class="flex items-center p-2 text-base font-normal text-white rounded-lg hover:bg-red-600">
                        <svg class="w-6 h-6 text-gray-300 transition duration-75 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4V4"></path>
                        </svg>
                        <span class="ml-3">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex flex-col w-full min-h-screen">
        <!-- Top Bar with Title -->
        <header class="bg-gray-800 text-white shadow-md">
            <div class="flex justify-between items-center max-w-screen-xl mx-auto px-4 py-3 ml-2">
                <h1 class="text-lg md:text-xl font-bold tracking-wide">SISTEM RENTAL ADMIN</h1>
            </div>
        </header>


        <!-- Main Content -->
        <main class="flex-1 bg-gray-50 p-6 overflow-y-auto">
            <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-4 sm:p-6">
                @yield('contents')
            </div>
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