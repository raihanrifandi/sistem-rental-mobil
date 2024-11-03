@extends('layouts.app')
@section('title', 'Login Signup Rental yUK')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">
        Dashboard Ini
    </h1>
    
    <div class="grid grid-cols-3 gap-4 mt-5 ml-3 mr-3">
        
        <div class="bg-gray-100 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-700">Jumlah Produk</h2>
            <p class="text-2xl font-bold text-gray-800">{{ $jumlahMobil }}</p>
        </div>

        <div class="bg-gray-200 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-700">Produk Tersewa</h2>
            <p class="text-2xl font-bold text-gray-800">{{ $mobilTersewa }}</p>
        </div>

        
        <div class="bg-gray-300 p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-700">-</h2>
            <p class="text-2xl font-bold text-gray-800">-</p>
        </div>
    </div>
</div>
@endsection