<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.5.0/dist/flowbite.min.css" rel="stylesheet">
    <link rel="icon" href="assets/img/logo.png">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('js/admin.js') }}"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="h-screen flex bg-gray-50">
   <!-- Side Bar Area-->
    @include('components.sidebar')
    <!-- Main Content Area -->
    <div class="flex flex-col w-full min-h-screen">
        <!-- Top Bar with Profile -->
        <div class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
            <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
                <br>
                <br>
            </div>   
            <!-- Main Content -->
            <main class="flex-1 bg-gray-50 p-6 overflow-y-auto overflow-x-hidden">
                <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-4 sm:p-6">
                    <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                        <i class="ri-menu-line"></i>
                    </button>
                    @yield('contents')
                </div>
            </main>
        </div>
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