<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="h-screen flex bg-gray-100">
    <!-- Sidebar with Header Elements -->
    <aside class="bg-gray-800 text-white w-20 flex flex-col items-center pt-4 space-y-4">
        <!-- Profile Picture -->
        <div class="flex flex-col items-center">
            <img src="https://i.pinimg.com/736x/a0/1e/6f/a01e6fa95f54f561303a558adf40a721.jpg" alt="Profile"
                class="w-10 h-10 rounded-full border-2 border-white shadow-md">
        </div>

        <!-- Navigation Links -->
        <div class="flex flex-col space-y-4 items-center">
            <a href="{{ route('admin/home') }}" class="text-white hover:bg-gray-700 p-2 rounded-full w-full flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7m-9-2v8m4 4h6a2 2 0 002-2v-5a2 2 0 00-.586-1.414L13 3a2 2 0 00-2.828 0L3.586 9.586A2 2 0 003 11v1m9 4h2" />
                </svg>
                <span class="text-xs hidden md:block">Home</span>
            </a>
            <a href="{{ route('products.index') }}" class="text-white hover:bg-gray-700 p-2 rounded-full w-full flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7h2a1 1 0 011 1v11a1 1 0 001 1h10a1 1 0 001-1V8a1 1 0 011-1h2M16 3H8a1 1 0 00-1 1v2a1 1 0 001 1h8a1 1 0 001-1V4a1 1 0 00-1-1z" />
                </svg>
                <span class="text-xs hidden md:block">Products</span>
            </a>
            <!-- Logout link with confirmation -->
            <a href="{{ route('logout') }}" onclick="return confirmLogout()" class="text-white hover:bg-gray-700 p-2 rounded-full w-full flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4V4" />
                </svg>
                <span class="text-xs hidden md:block">Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <div>@yield('contents')</div>
    </main>

    <script>
        // Function to show logout confirmation dialog
        function confirmLogout() {
            return confirm('Are you sure you want to logout?');
        }
    </script>
</body>

</html>
