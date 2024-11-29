@extends('layouts.user')
@section('title', '404 Not Found')

@section('contents')
<div class="flex flex-col items-center justify-center min-h-screen bg-white space-y-6 px-4">
    <div class="w-full max-w-md">
        <!-- Placeholder for 404 Illustration -->
        <div class="w-full h-64 flex items-center justify-center mb-6">
            <img src="../../assets/img/error404.png" class="width: 49px; height: 28px;" alt="404-not-found">
        </div>
        
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">404 - Page Not Found</h1>
            
            <p class="text-gray-600 mb-6">
                We are sorry, but the page you are looking for does not exist or has been moved. 
                Please check the URL or return to the homepage.
            </p>
            
            <a href="{{ route('home') }}" class="inline-block bg-gradient-button text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                Go to Homepage
            </a>
        </div>
    </div>
</div>
@endsection