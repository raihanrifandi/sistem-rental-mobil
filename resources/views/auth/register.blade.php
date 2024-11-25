<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="ie=edge" http-equiv="X-UA-Compatible" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <section class="h-screen flex">
        <!-- Bagian Gambar -->
        <div class="hidden md:flex w-1/2 h-full items-center justify-center">
            <img alt="Gambar ini" class="w-300 h-350 object-contain" src="assets/img/login-img.png" />
        </div>
        <!-- Bagian Form Register -->
        <div class="flex flex-col items-center justify-center w-full md:w-1/2 px-6 py-8 mx-auto lg:py-0">
            <!-- Card -->
            <div class="bg-white rounded-lg shadow-lg w-full max-w-sm p-4">
                <div class="text-center mb-4 text-xl font-semibold text-gray-900">
                    Register
                </div>
                <h1 class="text-lg font-bold leading-tight tracking-tight text-gray-900 md:text-xl mb-4">
                    Create an account
                </h1>
                <form action="{{ route('register.save') }}" class="space-y-4" method="POST">
                    @csrf
                    <!-- Name -->
                    <div>
                        <label for="name" class="block mb-1 text-sm font-medium text-gray-900">Your name</label>
                        <input type="text" name="name" id="name" placeholder="Your name" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Email dan Phone Number -->
                    <div class="flex space-x-4">
                        <!-- Email -->
                        <div class="w-1/2">
                            <label for="email" class="block mb-1 text-sm font-medium text-gray-900">Your
                                email</label>
                            <input type="email" name="email" id="email" placeholder="name@company.com" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                            @error('email')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Phone Number -->
                        <div class="w-1/2">
                            <label for="phone_number" class="block mb-1 text-sm font-medium text-gray-900">Phone
                                Number</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="+628123456789"
                                required
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                            @error('phone_number')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Address -->
                    <div>
                        <label for="address" class="block mb-1 text-sm font-medium text-gray-900">Address</label>
                        <textarea name="address" id="address" rows="2" placeholder="Your full address" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"></textarea>
                        @error('address')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                        @error('password')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-900">Confirm
                            password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="••••••••" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                        @error('password_confirmation')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Terms -->
                    <div class="flex items-start">
                        <input type="checkbox" required
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500">
                        <label for="terms" class="ml-2 text-sm text-gray-500">I accept the <a href="#"
                                class="text-blue-500 hover:underline">Terms and Conditions</a></label>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
                        Create an account
                    </button>
                    <p class="text-sm text-center text-gray-500 mt-3">Already have an account? <a
                            href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a></p>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
